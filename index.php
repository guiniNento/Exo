
    <?php
    include_once('secu.php');
    $a=premier(1,25);
    AffichePremier($a);
    //$nb=exposant(10,4);
    //echo  '<br>'.$nb;
    ?>    
    <form action="secu.php" method="get" class="forme">
      <label for="Nom">Choisir P:</label>  <select name="p" id="jew">
        <?php
        include_once('secu.php');
        $a=premier(1,25);
        //$bb=print_r(count($a=premieur($b,$c)));
foreach($a as $element){
    echo "<option value='$element'>".$element.'</option>';}?>
        </select>
        <label for="Nom">Choisir Q:</label>  <select name="q" id="jewe">
        <?php
        include_once('secu.php');
        $a=premier(1,25);
        //$bb=print_r(count($a=premieur($b,$c)));
foreach($a as $element){
    echo "<option value='$element'>".$element.'</option>';}?>
        </select>

        </select>
        <label for="Nom">Choisir e:</label>  <select name="e" id="je">
        <?php
        include_once('secu.php');
        $a=premier(1,25);
        //$bb=print_r(count($a=premieur($b,$c)));
foreach($a as $element){
    echo "<option value='$element'>".$element.'</option>';}?>
        </select>
    <div>
        <input type="submit" name="gene" value="Generer les clés" class="bouton">
        <input type="reset" value="Effacer" class="bouton">
        <input type="submit" name="cri" value="Crypter Un message" class="bouton">
        <input type="submit" name="decri" value="Decrypter Un message"  class="bouton">
        </div>
        <input type="text" name="message" id="">

    </div>

</body>
</html>