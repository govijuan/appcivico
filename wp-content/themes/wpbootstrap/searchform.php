<form role= "search" method="get" id="searchform"  action="<?php echo home_url('/category/aplicativos')?>" >
    <div class="float-left">
<!--//          <div class="field">
        <select name="order" onChange="document.forms[0].submit();">
          <option value="">Ordenar Por</option>
          <option value="name" <?php //if ($_GET["order"] == "name") echo "selected" ?>>Nome</option>
          <option value="axis" <?php// if ($_GET["order"] == "axis") echo "selected" ?>>Eixo</option>
        </select>
      </div>
//-->
      <div class="field">
        <input type="text" id="s" name="s" value="" placeholder="" size="30">
        <input type="submit" id="searchsubmit" value=""><button class="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button></input>

      </div>
    </div>
    <div class="float-right">

    </div>
</form>
