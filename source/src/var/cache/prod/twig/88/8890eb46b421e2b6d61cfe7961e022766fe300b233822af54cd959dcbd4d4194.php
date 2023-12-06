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

/* @PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/index.html.twig */
class __TwigTemplate_65ccfaf70d6fc7b29606b971d29a4756f568d23a4cfd8b4f03788b42cf12dca6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'sql_manager_info_block' => [$this, 'block_sql_manager_info_block'],
            'sql_manager_warning_block' => [$this, 'block_sql_manager_warning_block'],
            'sql_manager_list_panel' => [$this, 'block_sql_manager_list_panel'],
            'sql_manager_settings_panel' => [$this, 'block_sql_manager_settings_panel'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 26
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/index.html.twig", 26);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 29
    public function block_content($context, array $blocks = [])
    {
        // line 30
        echo "    ";
        $this->displayBlock('sql_manager_info_block', $context, $blocks);
        // line 45
        echo "
    ";
        // line 46
        $this->displayBlock('sql_manager_warning_block', $context, $blocks);
        // line 55
        echo "
    ";
        // line 56
        $this->displayBlock('sql_manager_list_panel', $context, $blocks);
        // line 63
        echo "
    ";
        // line 64
        $this->displayBlock('sql_manager_settings_panel', $context, $blocks);
    }

    // line 30
    public function block_sql_manager_info_block($context, array $blocks = [])
    {
        // line 31
        echo "        <div class=\"row\">
            <div class=\"col\">
                <div class=\"alert alert-info\" role=\"alert\">
                    <p class=\"alert-text\">";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("How do I create a new SQL query?", [], "Admin.Advparameters.Help"), "html", null, true);
        echo "</p>
                    <ul>
                        <li>";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Click \"%add_new_label%\".", ["%add_new_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new SQL query", [], "Admin.Advparameters.Feature")], "Admin.Advparameters.Help"), "html", null, true);
        echo "</li>
                        <li>";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Fill in the fields and click \"%save_label%\".", ["%save_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", [], "Admin.Actions")], "Admin.Advparameters.Help"), "html", null, true);
        echo "</li>
                        <li>";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can then view the query results by clicking on the \"%view_label%\" action in the dropdown menu", ["%view_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("View", [], "Admin.Global")], "Admin.Advparameters.Help"), "html", null, true);
        echo "</li>
                        <li>";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can also export the query results as a CSV file by clicking on the \"%export_label%\" button", ["%export_label%" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export", [], "Admin.Actions")], "Admin.Advparameters.Help"), "html", null, true);
        echo "</li>
                    </ul>
                </div>
            </div>
        </div>
    ";
    }

    // line 46
    public function block_sql_manager_warning_block($context, array $blocks = [])
    {
        // line 47
        echo "        <div class=\"row\">
            <div class=\"col\">
                <div class=\"alert alert-warning\" role=\"alert\">
                    <p class=\"alert-text\">";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("When saving the query, only the \"SELECT\" SQL statement is allowed.", [], "Admin.Advparameters.Notification"), "html", null, true);
        echo "</p>
                </div>
            </div>
        </div>
    ";
    }

    // line 56
    public function block_sql_manager_list_panel($context, array $blocks = [])
    {
        // line 57
        echo "        <div class=\"row\">
            <div class=\"col\">
                ";
        // line 59
        $this->loadTemplate("@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/index.html.twig", 59)->display(twig_array_merge($context, ["grid" => ($context["requestSqlGrid"] ?? null)]));
        // line 60
        echo "            </div>
        </div>
    ";
    }

    // line 64
    public function block_sql_manager_settings_panel($context, array $blocks = [])
    {
        // line 65
        echo "        <div class=\"row justify-content-center\">
            <div class=\"col\">
                ";
        // line 67
        $this->loadTemplate("@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/Blocks/settings_panel.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/index.html.twig", 67)->display($context);
        // line 68
        echo "            </div>
        </div>
    ";
    }

    // line 73
    public function block_javascripts($context, array $blocks = [])
    {
        // line 74
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script src=\"";
        // line 76
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/sql_manager.bundle.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 77,  158 => 76,  152 => 74,  149 => 73,  143 => 68,  141 => 67,  137 => 65,  134 => 64,  128 => 60,  126 => 59,  122 => 57,  119 => 56,  110 => 50,  105 => 47,  102 => 46,  92 => 39,  88 => 38,  84 => 37,  80 => 36,  75 => 34,  70 => 31,  67 => 30,  63 => 64,  60 => 63,  58 => 56,  55 => 55,  53 => 46,  50 => 45,  47 => 30,  44 => 29,  34 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/RequestSql/index.html.twig", "/var/www/html/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/RequestSql/index.html.twig");
    }
}
