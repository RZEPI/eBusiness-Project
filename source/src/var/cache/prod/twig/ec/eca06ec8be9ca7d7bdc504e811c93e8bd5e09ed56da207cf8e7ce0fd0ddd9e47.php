<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @PrestaShop/Admin/Common/Grid/Columns/Content/severity_level.html.twig */
class __TwigTemplate_c292c67ea189293f4e6f460412428a8aa9575379f2046cc2bb17d84d225a89d4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        echo "
";
        // line 26
        $context["severity"] = $this->getAttribute(($context["record"] ?? null), "severity", []);
        // line 27
        $context["withMessage"] = $this->getAttribute($this->getAttribute(($context["column"] ?? null), "options", []), "with_message", []);
        // line 28
        echo "
";
        // line 29
        if ((($context["severity"] ?? null) == 1)) {
            // line 30
            echo "  ";
            $context["severityClass"] = "success";
            // line 31
            echo "  ";
            $context["severityMessage"] = ((($context["withMessage"] ?? null)) ? ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Informative only", [], "Admin.Advparameters.Help")) : (""));
        } elseif ((        // line 32
($context["severity"] ?? null) == 2)) {
            // line 33
            echo "  ";
            $context["severityClass"] = "warning";
            // line 34
            echo "  ";
            $context["severityMessage"] = ((($context["withMessage"] ?? null)) ? ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Warning", [], "Admin.Advparameters.Help")) : (""));
        } elseif ((        // line 35
($context["severity"] ?? null) == 3)) {
            // line 36
            echo "  ";
            $context["severityClass"] = "danger";
            // line 37
            echo "  ";
            $context["severityMessage"] = ((($context["withMessage"] ?? null)) ? ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Error", [], "Admin.Advparameters.Help")) : (""));
        } elseif ((        // line 38
($context["severity"] ?? null) == 4)) {
            // line 39
            echo "  ";
            $context["severityClass"] = "dark";
            // line 40
            echo "  ";
            $context["severityMessage"] = ((($context["withMessage"] ?? null)) ? ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Major issue (crash)!", [], "Admin.Advparameters.Help")) : (""));
        } else {
            // line 42
            echo "  ";
            $context["severityClass"] = "";
            // line 43
            echo "  ";
            $context["severityMessage"] = "";
        }
        // line 45
        echo "
<span class=\"badge badge-pill badge-";
        // line 46
        echo twig_escape_filter($this->env, ($context["severityClass"] ?? null), "html", null, true);
        echo "\">
  ";
        // line 47
        if (($context["withMessage"] ?? null)) {
            // line 48
            echo "    ";
            echo twig_escape_filter($this->env, ($context["severityMessage"] ?? null), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, ($context["severity"] ?? null), "html", null, true);
            echo ")
  ";
        } else {
            // line 50
            echo "    ";
            echo twig_escape_filter($this->env, ($context["severity"] ?? null), "html", null, true);
            echo "
  ";
        }
        // line 52
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/severity_level.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 52,  97 => 50,  89 => 48,  87 => 47,  83 => 46,  80 => 45,  76 => 43,  73 => 42,  69 => 40,  66 => 39,  64 => 38,  61 => 37,  58 => 36,  56 => 35,  53 => 34,  50 => 33,  48 => 32,  45 => 31,  42 => 30,  40 => 29,  37 => 28,  35 => 27,  33 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/severity_level.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Columns/Content/severity_level.html.twig");
    }
}
