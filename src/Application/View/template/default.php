<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title><?=$title ?? '' ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/exemplo_app_php/public/libs/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="http://localhost/exemplo_app_php/public/libs/jquery-ui/external/jquery/jquery.js"></script>
    <style>
      .promotion-active .product-value{
        text-decoration: line-through;
      }
      
      .promotion-active .promotion-value {
        font-size: 25px;
      }

      .modal a.close-modal {
        top: -3.5px;
  	    right: -3.5px;
      }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=__BASEURL__?>">Home </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=__BASEURL__?>admin/">ADmin</a>
          </li>
        </ul>
    
      </div>
    </nav>

    <main role="main" class="container" style="margin: 55px 10px;">
        {{content}}
    </main><!-- /.container -->
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="http://localhost/exemplo_app_php/public/libs/jquery-ui/jquery-ui.js"></script>
    <script src="http://localhost/exemplo_app_php/public/js/jquery.maskMoney.min.js"></script>
    <script src="http://localhost/exemplo_app_php/public/js/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script>
      $( function() {
        $('.date').datepicker({
          'dateFormat': 'dd/mm/yy'
        });

        $('.money').maskMoney({
          'prefix': 'R$ ',
          'thousands': '.',
          'decimal': ','
        });

        $('.weight').maskMoney({
          'thousands': '',
          'decimal': '.',
          'precision' : 3
        });

        $('.measures').maskMoney({
          'thousands': '',
          'decimal': '',
          'precision' : 0
        });
        $('.cep').mask('00000-000');
      } );
    </script>
  </body>
</html>