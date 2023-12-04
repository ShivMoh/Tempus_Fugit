<head>
    <link rel="stylesheet" href="<?=CSS_URL."bill-preview.css"?>">
</head>

<div class="container-sm bill-preview-container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-6">
            Transaction: <?=$data['bill']['id']?>
        </div>
        <div class="col-lg-auto col-sm-6">
            Date: <?=$data['bill']['order_date']?>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col text-center bill-preview-heading-1">
            <img src=<?=RESOURCE_URL."karens-kitchen-logo.png"?> alt="">
        </div>
    </div>
    
    <?php foreach($data['billItems'] as $item) : ?>
        <div class="row justify-content-center bill-preview-item-row">
            
            <div class="col-10 col-sm-9">
                <?=$item['amount']." of ".$item['name'] ?>
            </div>

            <div class="col col-sm-auto">
                $ <?=$item['total'] ?>
            </div>
        </div>
    <?php endforeach ?>

    <div class="row justify-content-center bill-preview-title-row">
        <div class="col-lg-8 col-sm-2"></div>
        <div class="col-lg-2 col-sm-5 bill-preview-heading-2">
            Total: 
        </div>
        <div class="col-lg-2 col-2 col-sm-5 col-sm-auto">
            $ <?= $data['bill']['total_cost']?>
        </div>
    </div>

 
    
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-5 col-sm">
        <form action=<?=BASE_URL."/bill"?> method="POST">
            <button class="bill-preview-cancel-button" type="submit">Back</button>
        </form>
    </div>
    <div class="col-lg-5 col-sm">
        <button class="bill-preview-print-button" onclick="print()">Print Bill</button>
    </div>
  </div>
</div>