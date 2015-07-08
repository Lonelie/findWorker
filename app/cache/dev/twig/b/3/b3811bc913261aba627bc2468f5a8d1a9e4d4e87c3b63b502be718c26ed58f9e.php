<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_b3811bc913261aba627bc2468f5a8d1a9e4d4e87c3b63b502be718c26ed58f9e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("TwigBundle::layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "TwigBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_aa753a4ef6c11589e01a12e911ff67f17f369620e90df5b5c91718cf8601374d = $this->env->getExtension("native_profiler");
        $__internal_aa753a4ef6c11589e01a12e911ff67f17f369620e90df5b5c91718cf8601374d->enter($__internal_aa753a4ef6c11589e01a12e911ff67f17f369620e90df5b5c91718cf8601374d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_aa753a4ef6c11589e01a12e911ff67f17f369620e90df5b5c91718cf8601374d->leave($__internal_aa753a4ef6c11589e01a12e911ff67f17f369620e90df5b5c91718cf8601374d_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_539c0825fe59b2378d55ac65a9f072c5d065a6b7fd4e52fe2d3f97ed79906bba = $this->env->getExtension("native_profiler");
        $__internal_539c0825fe59b2378d55ac65a9f072c5d065a6b7fd4e52fe2d3f97ed79906bba->enter($__internal_539c0825fe59b2378d55ac65a9f072c5d065a6b7fd4e52fe2d3f97ed79906bba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_539c0825fe59b2378d55ac65a9f072c5d065a6b7fd4e52fe2d3f97ed79906bba->leave($__internal_539c0825fe59b2378d55ac65a9f072c5d065a6b7fd4e52fe2d3f97ed79906bba_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_4bea8f4f9c14e5e587f6f94442460e73ce737420c025418a845271c44aa2805c = $this->env->getExtension("native_profiler");
        $__internal_4bea8f4f9c14e5e587f6f94442460e73ce737420c025418a845271c44aa2805c->enter($__internal_4bea8f4f9c14e5e587f6f94442460e73ce737420c025418a845271c44aa2805c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_4bea8f4f9c14e5e587f6f94442460e73ce737420c025418a845271c44aa2805c->leave($__internal_4bea8f4f9c14e5e587f6f94442460e73ce737420c025418a845271c44aa2805c_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_90118deaad9600b7c1d5a100640b08133e4d428720a0424c577d7144f4c27e9e = $this->env->getExtension("native_profiler");
        $__internal_90118deaad9600b7c1d5a100640b08133e4d428720a0424c577d7144f4c27e9e->enter($__internal_90118deaad9600b7c1d5a100640b08133e4d428720a0424c577d7144f4c27e9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("TwigBundle:Exception:exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_90118deaad9600b7c1d5a100640b08133e4d428720a0424c577d7144f4c27e9e->leave($__internal_90118deaad9600b7c1d5a100640b08133e4d428720a0424c577d7144f4c27e9e_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
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
