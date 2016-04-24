<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \mysqli;

class TrainScheduleController extends Controller
{
    /**
     * @Route("/trainSchedule")
     * @Method({"POST"})
     */
    public function show(Request $request)
    {
        $trainNumber = $request->request->get('input_trainNumber');
        if(!$this->db_isTrainInDB($trainNumber)) {
            return $this->redirectToRoute('trainScheduleSearch', array("trainNumberError" => true), 302);
        } else {
            $schedule = $this->getTrainSchedule($trainNumber);
            $html = $this->container->get('templating')->render(
                'viewTrainSchedule/viewTrainSchedule.html.twig',
                array("trainNumber" => $trainNumber, "schedule" => $schedule)
            );
            return new Response($html);
        }
    }
    
    /**
     * @Route("/trainSchedule/search", name="trainScheduleSearch")
     */
    public function showSearch(Request $request)
    {
        $error = $request->query->get('trainNumberError');
        $html = $this->container->get('templating')->render('viewTrainSchedule/viewTrainScheduleSearch.html.twig', $error == null ? [] : array("trainNumberError" => true));
        return new Response($html);
    }

    private function db_isTrainInDB($trainNumber) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT * FROM Train_Route WHERE Train_Number='" . $trainNumber. "'");
        $row = $result->fetch_assoc();
        return $row != NULL;
    }

    private function getTrainSchedule($trainNumber) {
        $db = new mysqli("emptystream.com", "cs4400_test", "happy stuff", "cs4400_test");
        $result = $db->query("SELECT Train_Route.Train_Number, Arrival_Time, Departure_Time, Name FROM Train_Route INNER JOIN Stop ON Train_Route.Train_Number=Stop.Train_Number WHERE Train_Route.Train_Number=" . $trainNumber . " ORDER BY Arrival_Time");
        return $result->fetch_all();
    }
}

?>
