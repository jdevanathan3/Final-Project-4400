<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_50efc9c95e60048ead7b60ec0f1345b6602224a0413f5e1e65a4be52dc801385 extends Twig_Template
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
        $__internal_e087b162aed689e55d94da7335bb71cacb446471e118d78a1e93b4cd8c28e9f7 = $this->env->getExtension("native_profiler");
        $__internal_e087b162aed689e55d94da7335bb71cacb446471e118d78a1e93b4cd8c28e9f7->enter($__internal_e087b162aed689e55d94da7335bb71cacb446471e118d78a1e93b4cd8c28e9f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e087b162aed689e55d94da7335bb71cacb446471e118d78a1e93b4cd8c28e9f7->leave($__internal_e087b162aed689e55d94da7335bb71cacb446471e118d78a1e93b4cd8c28e9f7_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_cc5abb6829599967798f3a96ddf43b2f447b668ff48cade50909091eb8e6af0b = $this->env->getExtension("native_profiler");
        $__internal_cc5abb6829599967798f3a96ddf43b2f447b668ff48cade50909091eb8e6af0b->enter($__internal_cc5abb6829599967798f3a96ddf43b2f447b668ff48cade50909091eb8e6af0b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_cc5abb6829599967798f3a96ddf43b2f447b668ff48cade50909091eb8e6af0b->leave($__internal_cc5abb6829599967798f3a96ddf43b2f447b668ff48cade50909091eb8e6af0b_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_39e94b42c15065182f1cc8dee350dc6f715fc5dead8db0bb4728214f5444f7a6 = $this->env->getExtension("native_profiler");
        $__internal_39e94b42c15065182f1cc8dee350dc6f715fc5dead8db0bb4728214f5444f7a6->enter($__internal_39e94b42c15065182f1cc8dee350dc6f715fc5dead8db0bb4728214f5444f7a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_39e94b42c15065182f1cc8dee350dc6f715fc5dead8db0bb4728214f5444f7a6->leave($__internal_39e94b42c15065182f1cc8dee350dc6f715fc5dead8db0bb4728214f5444f7a6_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_151c5280ad2178cb9c6a7ff32ef9217db51d6e00fa6bab73747c18c0c6200db6 = $this->env->getExtension("native_profiler");
        $__internal_151c5280ad2178cb9c6a7ff32ef9217db51d6e00fa6bab73747c18c0c6200db6->enter($__internal_151c5280ad2178cb9c6a7ff32ef9217db51d6e00fa6bab73747c18c0c6200db6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_151c5280ad2178cb9c6a7ff32ef9217db51d6e00fa6bab73747c18c0c6200db6->leave($__internal_151c5280ad2178cb9c6a7ff32ef9217db51d6e00fa6bab73747c18c0c6200db6_prof);

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
