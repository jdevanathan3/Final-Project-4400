<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_4accfa357dbc2942c396ed797a545253d4205a5a45b8468cb07a4766c85ddc7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_61c4dadf4da7142a503f7e7e6077493070aaf2d7db2e6afef129571fd0b2f0db = $this->env->getExtension("native_profiler");
        $__internal_61c4dadf4da7142a503f7e7e6077493070aaf2d7db2e6afef129571fd0b2f0db->enter($__internal_61c4dadf4da7142a503f7e7e6077493070aaf2d7db2e6afef129571fd0b2f0db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_61c4dadf4da7142a503f7e7e6077493070aaf2d7db2e6afef129571fd0b2f0db->leave($__internal_61c4dadf4da7142a503f7e7e6077493070aaf2d7db2e6afef129571fd0b2f0db_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_9fdf895f1b8c37e97a95a258ecc2a687b53854a173d9fcd698b3535c1585df61 = $this->env->getExtension("native_profiler");
        $__internal_9fdf895f1b8c37e97a95a258ecc2a687b53854a173d9fcd698b3535c1585df61->enter($__internal_9fdf895f1b8c37e97a95a258ecc2a687b53854a173d9fcd698b3535c1585df61_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_9fdf895f1b8c37e97a95a258ecc2a687b53854a173d9fcd698b3535c1585df61->leave($__internal_9fdf895f1b8c37e97a95a258ecc2a687b53854a173d9fcd698b3535c1585df61_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_5bb95a188500c3b49bba0b3d93e1e534530d6f81a80c1c16bddd8d0cfe9bbd88 = $this->env->getExtension("native_profiler");
        $__internal_5bb95a188500c3b49bba0b3d93e1e534530d6f81a80c1c16bddd8d0cfe9bbd88->enter($__internal_5bb95a188500c3b49bba0b3d93e1e534530d6f81a80c1c16bddd8d0cfe9bbd88_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_5bb95a188500c3b49bba0b3d93e1e534530d6f81a80c1c16bddd8d0cfe9bbd88->leave($__internal_5bb95a188500c3b49bba0b3d93e1e534530d6f81a80c1c16bddd8d0cfe9bbd88_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_ffdc25a1c35b545cb8b7937ca87146ed75c40bd0b693b8d6fd4acecd4dff3e06 = $this->env->getExtension("native_profiler");
        $__internal_ffdc25a1c35b545cb8b7937ca87146ed75c40bd0b693b8d6fd4acecd4dff3e06->enter($__internal_ffdc25a1c35b545cb8b7937ca87146ed75c40bd0b693b8d6fd4acecd4dff3e06_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_ffdc25a1c35b545cb8b7937ca87146ed75c40bd0b693b8d6fd4acecd4dff3e06->leave($__internal_ffdc25a1c35b545cb8b7937ca87146ed75c40bd0b693b8d6fd4acecd4dff3e06_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
