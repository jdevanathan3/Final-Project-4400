<?php

/* base.html.twig */
class __TwigTemplate_fcfc08f2658639428888a7f005d5638b272342ff0ec668b03999680567aa19a9 extends Twig_Template
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
        $__internal_266d432c50d82bc8338453130b7631fdddb850b698b39af3dd23eb537b5ca797 = $this->env->getExtension("native_profiler");
        $__internal_266d432c50d82bc8338453130b7631fdddb850b698b39af3dd23eb537b5ca797->enter($__internal_266d432c50d82bc8338453130b7631fdddb850b698b39af3dd23eb537b5ca797_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_266d432c50d82bc8338453130b7631fdddb850b698b39af3dd23eb537b5ca797->leave($__internal_266d432c50d82bc8338453130b7631fdddb850b698b39af3dd23eb537b5ca797_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_284bfc18dd6ccd1d497ea7625f0f118a200128ac68da1cf456f8f59b50cd2c9a = $this->env->getExtension("native_profiler");
        $__internal_284bfc18dd6ccd1d497ea7625f0f118a200128ac68da1cf456f8f59b50cd2c9a->enter($__internal_284bfc18dd6ccd1d497ea7625f0f118a200128ac68da1cf456f8f59b50cd2c9a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_284bfc18dd6ccd1d497ea7625f0f118a200128ac68da1cf456f8f59b50cd2c9a->leave($__internal_284bfc18dd6ccd1d497ea7625f0f118a200128ac68da1cf456f8f59b50cd2c9a_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_39e82a13e6f25e066c02f04c17a2324893482de208abfc8b0237b8a815ba9c1f = $this->env->getExtension("native_profiler");
        $__internal_39e82a13e6f25e066c02f04c17a2324893482de208abfc8b0237b8a815ba9c1f->enter($__internal_39e82a13e6f25e066c02f04c17a2324893482de208abfc8b0237b8a815ba9c1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_39e82a13e6f25e066c02f04c17a2324893482de208abfc8b0237b8a815ba9c1f->leave($__internal_39e82a13e6f25e066c02f04c17a2324893482de208abfc8b0237b8a815ba9c1f_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_5c2bd7c360ac933c8f323dbb063ecd80b34cc4a1ce61f4b360b48403c4ab20d5 = $this->env->getExtension("native_profiler");
        $__internal_5c2bd7c360ac933c8f323dbb063ecd80b34cc4a1ce61f4b360b48403c4ab20d5->enter($__internal_5c2bd7c360ac933c8f323dbb063ecd80b34cc4a1ce61f4b360b48403c4ab20d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_5c2bd7c360ac933c8f323dbb063ecd80b34cc4a1ce61f4b360b48403c4ab20d5->leave($__internal_5c2bd7c360ac933c8f323dbb063ecd80b34cc4a1ce61f4b360b48403c4ab20d5_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_780be38a804f99a7bc47ed3dd72b352188a71f911e00cb502a19fbe75474c53a = $this->env->getExtension("native_profiler");
        $__internal_780be38a804f99a7bc47ed3dd72b352188a71f911e00cb502a19fbe75474c53a->enter($__internal_780be38a804f99a7bc47ed3dd72b352188a71f911e00cb502a19fbe75474c53a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_780be38a804f99a7bc47ed3dd72b352188a71f911e00cb502a19fbe75474c53a->leave($__internal_780be38a804f99a7bc47ed3dd72b352188a71f911e00cb502a19fbe75474c53a_prof);

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
