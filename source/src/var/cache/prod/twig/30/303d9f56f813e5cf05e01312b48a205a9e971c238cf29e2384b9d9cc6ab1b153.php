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

/* @PrestaShop/Admin/Configure/AdvancedParameters/LogsPage/Blocks/severity_levels.html.twig */
class __TwigTemplate_b4952761dd11b9061f47300a7a911f473e220633ff40b12b3b3e2ac6d8216395 extends \Twig\Template
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
        // line 26
        echo "<div class=\"col\">
  <div class=\"card\">
    <h3 class=\"card-header\">
      <i class=\"material-icons\">warning</i> ";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Severity levels", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
    </h3>
    <div class=\"card-block\">
      <div class=\"card-text\">
        <p>";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Meaning of severity levels:", [], "Admin.Advparameters.Feature"), "html", null, true);
        echo "</p>
        <ol>
          <li>
            <span class=\"badge badge-pill badge-success\">
              ";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Informative only", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
            </span>
          </li>
          <li>
            <span class=\"badge badge-pill badge-warning\">
              ";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Warning", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
            </span>
          </li>
          <li>
            <span class=\"badge badge-pill badge-danger\">
              ";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Error", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
            </span>
          </li>
          <li>
            <span class=\"badge badge-pill badge-dark\">
              ";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Major issue (crash)!", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "
            </span>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/LogsPage/Blocks/severity_levels.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 52,  65 => 47,  57 => 42,  49 => 37,  42 => 33,  35 => 29,  30 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/LogsPage/Blocks/severity_levels.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/LogsPage/Blocks/severity_levels.html.twig");
    }
}
