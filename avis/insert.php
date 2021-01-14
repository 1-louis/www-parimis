<?php
    require '../php/database.php';
 
    $nameError = $descriptionError = $priceError = $categoryError =   $name = $description = $price = $category =  "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $category           = checkInput($_POST['category']); 
       
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($price)) 
        {
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
   
        
        if($isSuccess ) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (name,description,price,category) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$category));
            Database::disconnect();
            header("Location: index.php");
        }
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<div style="text-align: left; margin:10px ; color:#eee; " class="container admin site">
    <div class="row">
        <h2><strong>RESERVEZ</strong></h2>
        <br>
        <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                <span class="help-inline"><?php echo $nameError;?></span>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>"></textarea>
                <span class="help-inline"><?php echo $descriptionError;?></span>
            </div>
          
            <div class="form-group">
                <label for="price">numero client: (en €)</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="client" value="<?php echo $price;?>">
                <span class="help-inline"><?php echo $priceError;?></span>
            </div>
            <div class="form-group">
                <select  class="form-control" id="category" name="category">
                <?php
                    $db = Database::connect();
                    foreach ($db->query('SELECT * FROM categories') as $row) 
                    {
                        echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                    }
                    Database::disconnect();
                ?>
                </select>
                <span class="help-inline"><?php echo $categoryError;?></span>
            </div>
           
          
            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div>
        </form>
    </div>
</div>

