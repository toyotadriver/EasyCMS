<?php
include_once 'php/debug_to_console.php';
$sdbc = new DBController;
$product = $sdbc->select('products', 'prod_id', htmlspecialchars($_GET['product']));
if (empty($product)) {
    echo '<h1>Товара не существует</h1>';
} else {
    $product_container = new ProductContainer;
    $product_container->product_content();
}
class ProductContainer
{
    public $productid;
    private $sdbc;
    public $product;
    public $product_name;
    public $product_description;
    private $product_image;
    private $product_sizes;


    function __construct()
    {
        $this->sdbc = new DBController;
        $this->productid = htmlspecialchars($_GET['product']);
        $this->product = $this->sdbc->selectjoin('products', 'products_descriptions', 'prod_id', 'id', 'prod_id', $this->productid);
        $this->product_image = $this->product['image'];
        $this->product_name = $this->product['product_name'];
        $this->product_description = $this->product['description'];
        $this->product_image = 'products_imgs/' . $this->product_image;
        
    }
    public function product_content()
    {
        $image_figure = <<<_imf
                <figure id='p_figure'>
                    <img id='p_image' src='$this->product_image'>
                </figure>
                _imf;
        $product_sizes = $this->product_sizes();
        $product_content = <<<_prod_content
                <div id='p_container'
                    $image_figure
                    <div id='name_and_description'>
                        <h1>$this->product_name</h1>
                        <div id='p_description'>
                            $this->product_description
                        </div>
                        <div id='p_sizes'>
                            $product_sizes
                        </div>
                    </div>
                </div>
            _prod_content;
        echo $product_content;
    }
    public function product_sizes()
    {
        $neededsizes = 'xs, s, m, l, xl, xxl';
        $sizesstmt = $this->sdbc->select('socksizes', 'id', $this->productid, $neededsizes);
        if (!$sizesstmt){
            return "<font color='red'>Размеров нет</font>";
        }
        $buttons = '';
        foreach ($sizesstmt as $size => $numberof)
        {
            $size = strtoupper($size);
            $buttons .= "<button class='pbtusual optsbt'>$size $numberof</button>";
        }
        return $buttons;
    }
}

?>