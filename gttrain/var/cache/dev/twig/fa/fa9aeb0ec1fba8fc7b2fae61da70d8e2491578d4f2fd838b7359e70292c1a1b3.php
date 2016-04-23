<?php

/* login.html.twig */
class __TwigTemplate_5b16bf0ed64477ae391eda6cac504967761850fa52139cf20a799c37482a8d2a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("base.html.twig", "login.html.twig", 2);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_21e27026dbfb5ebdc263ae937c00f98e5cd685eafa1144ce1b1acdd2f9b9342e = $this->env->getExtension("native_profiler");
        $__internal_21e27026dbfb5ebdc263ae937c00f98e5cd685eafa1144ce1b1acdd2f9b9342e->enter($__internal_21e27026dbfb5ebdc263ae937c00f98e5cd685eafa1144ce1b1acdd2f9b9342e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_21e27026dbfb5ebdc263ae937c00f98e5cd685eafa1144ce1b1acdd2f9b9342e->leave($__internal_21e27026dbfb5ebdc263ae937c00f98e5cd685eafa1144ce1b1acdd2f9b9342e_prof);

    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        $__internal_6f6e93be83991eb47e62ee203a5e6ad41cb041cbee96ce6bf15fcba675ca23ce = $this->env->getExtension("native_profiler");
        $__internal_6f6e93be83991eb47e62ee203a5e6ad41cb041cbee96ce6bf15fcba675ca23ce->enter($__internal_6f6e93be83991eb47e62ee203a5e6ad41cb041cbee96ce6bf15fcba675ca23ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "    <h1>Lucky Numbers: ";
        echo twig_escape_filter($this->env, (isset($context["luckyNumberList"]) ? $context["luckyNumberList"] : $this->getContext($context, "luckyNumberList")), "html", null, true);
        echo "</h1>
";
        
        $__internal_6f6e93be83991eb47e62ee203a5e6ad41cb041cbee96ce6bf15fcba675ca23ce->leave($__internal_6f6e93be83991eb47e62ee203a5e6ad41cb041cbee96ce6bf15fcba675ca23ce_prof);

    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 5,  34 => 4,  11 => 2,);
    }
}
/* {# app/Resources/views/login.html.twig #}*/
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block body %}*/
/*     <h1>Lucky Numbers: {{ luckyNumberList }}</h1>*/
/* {% endblock %}*/
