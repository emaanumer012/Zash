<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MakeUpProduct extends Controller
{
    /**
     * Display all products in the ProductTable view.
     *
     * @return \Illuminate\View\View
     */
    public function productTable()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Convert products to an array
        $productsArray = $products->toArray();

        // Create a compact array with products
        $data = compact('productsArray');

        // Render the ProductTable view and pass the data
        return view("ProductTable")->with($data);
    }

    /**
     * Display the homepage view with various product categories.
     *
     * @return \Illuminate\View\View
     */
    public function homepage()
    {
        // Retrieve best-selling products and products in different categories
        $bestSelling = Product::where('Quantity', '10')->orderBy("Quantity")->get()->toArray();
        $lips = Product::where('Category', 'LIPS')->get()->toArray();
        $eyes = Product::where('Category', 'EYES')->get()->toArray();
        $face = Product::where('Category', 'FACE')->get()->toArray();
        $skin = Product::where('Category', 'SKINCARE')->get()->toArray();
        $body = Product::where('Category', 'BODY')->get()->toArray();

        // Create a compact array with the retrieved data
        $data = compact('bestSelling', 'lips', 'eyes', 'face', 'body', 'skin');

        // Render the homepage view and pass the data
        return view("homepage")->with($data);
    }

   /**
     * Display lip sets in the LipSets view.
     *
     * @return \Illuminate\View\View
     */
    public function lipSets()
    {
        // Retrieve lip sets from the database
        $lipSets = Product::where('SubCategory', 'LIPSET')->get()->toArray();

        // Create a compact array with the retrieved lip sets
        $data = compact('lipSets');

        // Render the LipSets view and pass the data
        return view("LipSets")->with($data);
    }

    /**
     * Display lipsticks in the LipSticks view.
     *
     * @return \Illuminate\View\View
     */
    public function lipSticks()
    {
        // Retrieve lipsticks from the database
        $lipSticks = Product::where('SubCategory', 'LIPSTICK')->get()->toArray();

        // Create a compact array with the retrieved lipsticks
        $data = compact('lipSticks');

        // Render the LipSticks view and pass the data
        return view("LipSticks")->with($data);
    }

    /**
     * Display lip pencils in the LipPencils view.
     *
     * @return \Illuminate\View\View
     */
    public function lipPencils()
    {
        // Retrieve lip pencils from the database
        $lipPencils = Product::where('SubCategory', 'PENCIL')->get()->toArray();

        // Create a compact array with the retrieved lip pencils
        $data = compact('lipPencils');

        // Render the LipPencils view and pass the data
        return view("LipPencils")->with($data);
    }

    /**
     * Display lip tints in the LipTints view.
     *
     * @return \Illuminate\View\View
     */
    public function lipTints()
    {
        // Retrieve lip tints from the database
        $lipTints = Product::where('SubCategory', 'LIPTINT')->get()->toArray();

        // Create a compact array with the retrieved lip tints
        $data = compact('lipTints');

        // Render the LipTints view and pass the data
        return view("LipTints")->with($data);
    }

    /**
     * Display various lip products in the Lips view.
     *
     * @return \Illuminate\View\View
     */
    public function lips()
    {
        // Retrieve best-selling lip products, lip sets, lip pencils, lip tints, and lipsticks
        $bestSelling = Product::where('Category', 'LIPS')->orderBy("Quantity")->get()->toArray();
        $lipSets = Product::where('SubCategory', 'LIPSET')->get()->toArray();
        $lipPencils = Product::where('SubCategory', 'PENCIL')->get()->toArray();
        $lipTints = Product::where('SubCategory', 'LIPTINT')->get()->toArray();
        $lipSticks = Product::where('SubCategory', 'LIPSTICK')->get()->toArray();

        $data = compact('bestSelling', 'lipSets', 'lipPencils', 'lipTints', 'lipSticks');

        return view("Lips")->with($data);
    }
        /**
     * Display mascara products in the Mascara view.
     *
     * @return \Illuminate\View\View
     */
    public function mascara()
    {
        // Retrieve mascara products from the database
        $products = Product::where('subCategory', 'MASCARA')->get()->toArray();
        $data = compact('products');
        return view("Mascara")->with($data);
    }

    /**
     * Display eyeshadow products in the Eyeshadows view.
     *
     * @return \Illuminate\View\View
     */
    public function eyeshadow()
    {
        $products = Product::where('subCategory', 'EYESHADOW')->get()->toArray();

        // Create a compact array with the retrieved eyeshadow products
        $data = compact('products');

        return view("Eyeshadows")->with($data);
    }

    /**
     * Display eyeliner products in the EyeLiners view.
     *
     * @return \Illuminate\View\View
     */
    public function eyeliner()
    {
        $products = Product::where('subCategory', 'LINER')->get()->toArray();

        $data = compact('products');

        return view("EyeLiners")->with($data);
    }

    /**
     * Display various eye products in the Eyes view.
     *
     * @return \Illuminate\View\View
     */
    public function eyes()
    {
        // Retrieve best-selling eye products, mascaras, eyeliners, and eyeshadows
        $bestSelling = Product::where('Category', 'EYES')->orderBy("Quantity")->get()->toArray();
        $Mascaras = Product::where('subCategory', 'MASCARA')->get()->toArray();
        $liners = Product::where('subCategory', 'LINER')->get()->toArray();
        $Eyeshadows = Product::where('subCategory', 'EYESHADOW')->get()->toArray();
        $data = compact('bestSelling', 'Eyeshadows', 'Mascaras', 'liners');
        return view("eyes")->with($data);
    }

    /**
     * Display serum products in the Serums view.
     *
     * @return \Illuminate\View\View
     */
    public function serum()
    {
        $products = Product::where('subCategory', 'SERUM')->get()->toArray();

        $data = compact('products');


        return view("Serums")->with($data);
    }

    /**
     * Display cleanser products in the Cleansers view.
     *
     * @return \Illuminate\View\View
     */
    public function cleanser()
    {

        $products = Product::where('subCategory', 'CLEANSER')->get()->toArray();

        $data = compact('products');

        return view("Cleansers")->with($data);
    }

    /**
     * Display mask products in the Masks view.
     *
     * @return \Illuminate\View\View
     */
    public function mask()
    {
        $products = Product::where('subCategory', 'MASK')->get()->toArray();

        $data = compact('products');
        return view("Masks")->with($data);
    }

    /**
     * Display various skincare products in the Skincare view.
     *
     * @return \Illuminate\View\View
     */
    public function skincare()
    {
        $bestSelling = Product::where('Category', 'SKINCARE')->orderBy("Quantity")->get()->toArray();
        $Cleansers = Product::where('subCategory', 'CLEANSER')->get()->toArray();
        $Serums = Product::where('subCategory', 'SERUM')->get()->toArray();
        $Masks = Product::where('subCategory', 'MASK')->get()->toArray();
        $data = compact('bestSelling', 'Cleansers', 'Serums', 'Masks');

        return view("Skincare")->with($data);
    }

    /**
     * Display highlighter products in the Highlighters view.
     *
     * @return \Illuminate\View\View
     */
    public function highlighter()
    {
        $products = Product::where('subCategory', 'HIGHLIGHTER')->get()->toArray();
        $data = compact('products');
        return view("Highlighters")->with($data);
    }

    /**
     * Display concealer products in the Concealer view.
     *
     * @return \Illuminate\View\View
     */
    public function concealer()
    {
  
        $products = Product::where('subCategory', 'CONCEALER')->get()->toArray();
        $data = compact('products');
        return view("Concealer")->with($data);
    }
    /**
     * Display foundation products in the Foundation view.
     *
     * @return \Illuminate\View\View
     */

    public function foundation()
    {
        $products = Product::where('subCategory', 'FOUNDATION')->get();
        $products = $products->toArray();
        $data = compact('products');
        return view("Foundation")->with($data);

    }
        /**
     * Display brush products in the Brushes view.
     *
     * @return \Illuminate\View\View
     */
  public function brush()
    {
        $products = Product::where('subCategory', 'BRUSH')->get();
        $products = $products->toArray();
        $data = compact('products');
        return view("Brushes")->with($data);
    }
    /**
     * Display blush products in the Blush view.
     *
     * @return \Illuminate\View\View
     */
    public function blush()
    {
        $products = Product::where('subCategory', 'BLUSH')->get();
        $products = $products->toArray();
        $data = compact('products');
        return view("Blush")->with($data);
    }

    
    /**
     * Display various face products in the Face view.
     *
     * @return \Illuminate\View\View
     */
    public function face()
    {
        $bestSelling = Product::where('Category', 'FACE')->orderBy("Quantity")->get();
        $bestSelling = $bestSelling->toArray();
        $Highlighters = Product::where('subCategory', 'HIGHLIGHTER')->get();
        $Highlighters = $Highlighters->toArray();
        $Blushs = Product::where('subCategory', 'BLUSH')->get();
        $Blushs = $Blushs->toArray();
        $Foundations = Product::where('subCategory', 'FOUNDATION')->get();
        $Foundations = $Foundations->toArray();
        $Brushs = Product::where('subCategory', 'BRUSH')->get();
        $Brushs = $Brushs->toArray();
        $Concealers = Product::where('subCategory', 'CONCEALER')->get();
        $Concealers = $Concealers->toArray();

        $data = compact('bestSelling', 'Highlighters','Foundations', 'Concealers', 'Blushs','Brushs');
        return view("Face")->with($data);
    }
    /**
     * Display scrub products in the Scrubs view.
     *
     * @return \Illuminate\View\View
     */

    public function scrub()
    {
        $products = Product::where('subCategory', 'SCRUBS')->get();
        $products = $products->toArray();
        $data = compact('products');
        return view("Scrubs")->with($data);
    }
    /**
     * Display oil products in the Oils view.
     *
     * @return \Illuminate\View\View
     */
    public function oil()
    {
        $products = Product::where('subCategory', 'OILS')->get();
        $products = $products->toArray();
        $data = compact('products');
        return view("Oils")->with($data);
    }

    /**
     * Display lotion products in the Lotions view.
     *
     * @return \Illuminate\View\View
     */

    public function lotion()
    {
        $products = Product::where('subCategory', 'LOTION')->get();
        $products = $products->toArray();
        $data = compact('products');
        return view("Lotions")->with($data);
    }

    /**
     * Display various body products in the Body view.
     *
     * @return \Illuminate\View\View
     */
    public function body()
    {
        $bestSelling = Product::where('Category', 'BODY')->orderBy("Quantity")->get();
        $bestSelling = $bestSelling->toArray();
        $Scrubs = Product::where('subCategory', 'SCRUBS')->get();
        $Scrubs = $Scrubs->toArray();
        $Lotions = Product::where('subCategory', 'LOTION')->get();
        $Lotions = $Lotions->toArray();
        $Oils = Product::where('subCategory', 'OILS')->get();
        $Oils = $Oils->toArray();

        $data = compact('bestSelling', 'Scrubs','Oils','Lotions');
        return view("Body")->with($data);
    }
    /**
     * Display sale products in the Sale view.
     *
     * @return \Illuminate\View\View
     */
    public function sale()
    {
        $sales = Product::where('sale', '1')->get();
        $sales = $sales->toArray();

        $data = compact('sales');
        return view("Sale")->with($data);


    }
}
