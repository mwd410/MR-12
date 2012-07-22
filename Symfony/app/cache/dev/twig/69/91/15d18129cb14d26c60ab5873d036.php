<?php

/* MR12MainBundle:Product:index.html.twig */
class __TwigTemplate_699115d18129cb14d26c60ab5873d036 extends Twig_Template
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
        echo " 
 
  <table>
    <tr>
      <th>Name</th>
      <th>Price</th>
      <th>Description</th>
      <th>Edit</th>
      <th>Delete</th>
      <th>Add to Invoice</th>
    </tr>
  ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "products"));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 16
            echo "    <tr>
      <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "name"), "html", null, true);
            echo "</td>
      <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "price"), "html", null, true);
            echo "</td>
      <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "product"), "description"), "html", null, true);
            echo "</td>
      <td>/edit/</td>
      <td><a href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("product_delete", array("id" => $this->getAttribute($this->getContext($context, "product"), "id"))), "html", null, true);
            echo "\">Delete</a></td>
      <td>
        <form method=\"POST\" action=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("invoice_add", array("product_id" => $this->getAttribute($this->getContext($context, "product"), "id"))), "html", null, true);
            echo "\">
          <select name=\"invoice_id\">
            ";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "invoices"));
            foreach ($context['_seq'] as $context["_key"] => $context["invoice"]) {
                // line 26
                echo "              <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "invoice"), "id"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "invoice"), "name"), "html", null, true);
                echo "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['invoice'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 28
            echo "          </select>
          <input type=\"submit\" value=\"Add\">
        </form>
      </td>
    </tr>  
    
  
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 36
        echo "  </table>
 ";
    }

    public function getTemplateName()
    {
        return "MR12MainBundle:Product:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 36,  87 => 28,  76 => 26,  72 => 25,  67 => 23,  62 => 21,  57 => 19,  53 => 18,  49 => 17,  46 => 16,  42 => 15,  29 => 4,  26 => 3,);
    }
}
