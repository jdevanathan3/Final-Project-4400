<?php

/* base.html.twig */
class __TwigTemplate_2c5a2872432f50d0689378c8123e9bebff0c16c0b96266ec290293d60bacaac0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e830329c91de9f53a6aa2212de954c95215b9afa869723f5de1eac3e67fa0173 = $this->env->getExtension("native_profiler");
        $__internal_e830329c91de9f53a6aa2212de954c95215b9afa869723f5de1eac3e67fa0173->enter($__internal_e830329c91de9f53a6aa2212de954c95215b9afa869723f5de1eac3e67fa0173_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_e830329c91de9f53a6aa2212de954c95215b9afa869723f5de1eac3e67fa0173->leave($__internal_e830329c91de9f53a6aa2212de954c95215b9afa869723f5de1eac3e67fa0173_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_2a4fa0123c8c9455bf0beb043a9de56453ea4f055a846c04902b5d9fb2aae788 = $this->env->getExtension("native_profiler");
        $__internal_2a4fa0123c8c9455bf0beb043a9de56453ea4f055a846c04902b5d9fb2aae788->enter($__internal_2a4fa0123c8c9455bf0beb043a9de56453ea4f055a846c04902b5d9fb2aae788_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_2a4fa0123c8c9455bf0beb043a9de56453ea4f055a846c04902b5d9fb2aae788->leave($__internal_2a4fa0123c8c9455bf0beb043a9de56453ea4f055a846c04902b5d9fb2aae788_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_f2d75c47d43e41265cccc36bbb9698a4be737be73157524220f6dbffd2883068 = $this->env->getExtension("native_profiler");
        $__internal_f2d75c47d43e41265cccc36bbb9698a4be737be73157524220f6dbffd2883068->enter($__internal_f2d75c47d43e41265cccc36bbb9698a4be737be73157524220f6dbffd2883068_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_f2d75c47d43e41265cccc36bbb9698a4be737be73157524220f6dbffd2883068->leave($__internal_f2d75c47d43e41265cccc36bbb9698a4be737be73157524220f6dbffd2883068_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_ca4cf9cff8ba8ef3851719c1bbfa6dd255123d85f9cfa225c0ba144942a86cca = $this->env->getExtension("native_profiler");
        $__internal_ca4cf9cff8ba8ef3851719c1bbfa6dd255123d85f9cfa225c0ba144942a86cca->enter($__internal_ca4cf9cff8ba8ef3851719c1bbfa6dd255123d85f9cfa225c0ba144942a86cca_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_ca4cf9cff8ba8ef3851719c1bbfa6dd255123d85f9cfa225c0ba144942a86cca->leave($__internal_ca4cf9cff8ba8ef3851719c1bbfa6dd255123d85f9cfa225c0ba144942a86cca_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f09e967408e853250e650660d260755326484e5af5283a5a5b029753c960749f = $this->env->getExtension("native_profiler");
        $__internal_f09e967408e853250e650660d260755326484e5af5283a5a5b029753c960749f->enter($__internal_f09e967408e853250e650660d260755326484e5af5283a5a5b029753c960749f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_f09e967408e853250e650660d260755326484e5af5283a5a5b029753c960749f->leave($__internal_f09e967408e853250e650660d260755326484e5af5283a5a5b029753c960749f_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
