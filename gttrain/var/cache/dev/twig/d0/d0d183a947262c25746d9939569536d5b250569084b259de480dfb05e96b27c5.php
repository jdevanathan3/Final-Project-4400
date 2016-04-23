<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_3bce68492d3379521b0153dfe7f7cfece5901472dc3d1f63643fc127b868a4d4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9c883f62de3fdcbe5ae1a7030e79766c3b86f9015a9947e8a06075d8a6220da6 = $this->env->getExtension("native_profiler");
        $__internal_9c883f62de3fdcbe5ae1a7030e79766c3b86f9015a9947e8a06075d8a6220da6->enter($__internal_9c883f62de3fdcbe5ae1a7030e79766c3b86f9015a9947e8a06075d8a6220da6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9c883f62de3fdcbe5ae1a7030e79766c3b86f9015a9947e8a06075d8a6220da6->leave($__internal_9c883f62de3fdcbe5ae1a7030e79766c3b86f9015a9947e8a06075d8a6220da6_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_b5b6396bb34803b7864c8f76fab635b6753094eed22758c26c5efb9ca6740a3b = $this->env->getExtension("native_profiler");
        $__internal_b5b6396bb34803b7864c8f76fab635b6753094eed22758c26c5efb9ca6740a3b->enter($__internal_b5b6396bb34803b7864c8f76fab635b6753094eed22758c26c5efb9ca6740a3b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_b5b6396bb34803b7864c8f76fab635b6753094eed22758c26c5efb9ca6740a3b->leave($__internal_b5b6396bb34803b7864c8f76fab635b6753094eed22758c26c5efb9ca6740a3b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_ff5ac9097b7792b1389b921958834452e19ca5429550275cc1d1ad84bd2287e6 = $this->env->getExtension("native_profiler");
        $__internal_ff5ac9097b7792b1389b921958834452e19ca5429550275cc1d1ad84bd2287e6->enter($__internal_ff5ac9097b7792b1389b921958834452e19ca5429550275cc1d1ad84bd2287e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_ff5ac9097b7792b1389b921958834452e19ca5429550275cc1d1ad84bd2287e6->leave($__internal_ff5ac9097b7792b1389b921958834452e19ca5429550275cc1d1ad84bd2287e6_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_800eb6f113ff8dc729a093bb8ce492aec19ecac46a5628047fcc4ea71df26ba3 = $this->env->getExtension("native_profiler");
        $__internal_800eb6f113ff8dc729a093bb8ce492aec19ecac46a5628047fcc4ea71df26ba3->enter($__internal_800eb6f113ff8dc729a093bb8ce492aec19ecac46a5628047fcc4ea71df26ba3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_800eb6f113ff8dc729a093bb8ce492aec19ecac46a5628047fcc4ea71df26ba3->leave($__internal_800eb6f113ff8dc729a093bb8ce492aec19ecac46a5628047fcc4ea71df26ba3_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
