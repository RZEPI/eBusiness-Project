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

/* @PrestaShop/Admin/Common/Grid/Columns/Content/employee_name_with_avatar.html.twig */
class __TwigTemplate_4f1ec8c865322118b24fd88129592536cea2290d2108142753af14ec6615c792 extends \Twig\Template
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
        if ( !(null === $this->getAttribute(($context["record"] ?? null), "employee", []))) {
            // line 27
            echo "  <span class=\"employee_avatar_small\">
    <img class=\"img rounded-circle\" alt=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute(($context["record"] ?? null), "employee", []), "html", null, true);
            echo "\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl($this->getAttribute(($context["record"] ?? null), "image", [])), "html", null, true);
            echo "\" height=\"32\" width=\"32\" />
  </span>
  ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute(($context["record"] ?? null), "employee", []), "html", null, true);
            echo "
";
        } else {
            // line 32
            echo "  ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", [], "Admin.Global"), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Columns/Content/employee_name_with_avatar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 32,  45 => 30,  38 => 28,  35 => 27,  33 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Columns/Content/employee_name_with_avatar.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/Columns/Content/employee_name_with_avatar.html.twig");
    }
}
