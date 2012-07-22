<?php

/* MR12MainBundle:Invoice:index.html.twig */
class __TwigTemplate_51c918a69b3c47b4272732bb5dfec698 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("MR12MainBundle::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MR12MainBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
        echo "
 
  ";
        // line 6
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "invoices"));
        foreach ($context['_seq'] as $context["_key"] => $context["invoice"]) {
            // line 7
            echo "  <h1>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "invoice"), "name"), "html", null, true);
            echo "</h1><br>
    <ul>
    ";
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "invoice"), "products"));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 10
                echo "      <li>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "name"), "html", null, true);
                echo "</li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 12
            echo "    </ul>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['invoice'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 14
        echo "  </table>
 ";
    }

    public function getTemplateName()
    {
        return "MR12MainBundle:Invoice:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 14,  58 => 12,  49 => 10,  45 => 9,  39 => 7,  35 => 6,  29 => 4,  26 => 3,);
    }
}
