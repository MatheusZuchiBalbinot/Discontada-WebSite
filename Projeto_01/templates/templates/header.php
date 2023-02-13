<header> 

            <div class="header_n1">
                
                <img src='Images/Logotipo Online Shopping Azul Simples.png' onClick="location.href='main.php'" >
            </div>

            <div class="header_n2">
                <div class="search_box">
                    <!-- <span class="material-symbols-outlined" id="search_button" onclick=''> Search </span> -->
                        <div class="search_bar"> 
                            <form method="GET" name="form" action="main.php">
                                <input type="text" id="search_bar_input" name="data" placeholder= "O que você deseja? " onchange='search_data()'>
                                <button type='button'> submit </button>

                                <?php
                                    if(!empty($_GET['search']))
                                    {
                                        $search_value = $_GET['search'];
                                        $items = file_get_contents("items.json");
                                        $obj_items = json_decode($items);
                                        $variavel_sessão = [];

                                        for($x = 0; $x < count($obj_items); $x++)
                                        {
                                            $item_name = $obj_items[$x]->name;

                                            if(stripos($item_name, $search_value) !== FALSE)
                                            {
                                                $items_array_object = [
                                                    'name' => $obj_items[$x]->name,
                                                    'price' => $obj_items[$x]->price,
                                                    'oldPrice' => $obj_items[$x]->oldPrice,
                                                    'image' => $obj_items[$x]->image,
                                                    'discount_percent' => $obj_items[$x]->discount_percent,
                                                    'sales' => $obj_items[$x]->sales,
                                                ];    
                                                array_push($variavel_sessão, $items_array_object);
                                            }
                                            
                                        }
                                    $_SESSION['searched_items_array'] = $variavel_sessão; 
                                    header("Location: searched_items.php");                                   
                                    } 
                                    else 
                                    {
                                        echo "não tem nada";
                                    }
                                ?>
                            </form>

                        </div>
                </div>
                
            </div>

            <div class="header_n3">

                <?php
                    if(!empty($login_true))
                    {
                        echo "<a> Bem vindo <br> <i> $login_true </i>  </a>";
                    }
                ?>
                <span class='material-symbols-outlined' onClick="location.href='logout.php'"> Logout </span>
                <span class="material-symbols-outlined" onClick="location.href='cart.php'"> Shopping_cart </span>
            </div>
            
        </header>