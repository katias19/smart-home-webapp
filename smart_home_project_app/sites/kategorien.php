<?php     
if (!isset($_SESSION)) { session_start(); }
$err_msg = '';
   
?>  

<section id='kategorien' class="sec2">
          <div class="container">
            <h2>Smart Home Service</h2>
            <div class="row">
                <div class="col-md-12" id="rooms">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="padding: 20px;">
                                        <div class="col-md-5 col-md-offset-1 picto" style="float: none; margin: auto;">
                                          <a href="index.php?selectedMenu=l">
                                            <img src="res/img/light_on.png" alt="Licht">
                                          </a>
                                          <ap"><h3>Licht</h3></p>
                                        </div>   
                                </td>

                                <td style="padding: 20px;">
                                    
                                        <div class="col-md-5 col-md-offset-1 picto" style="float: none; margin: auto;">
                                          <a href="index.php?selectedMenu=s">
                                            <img src="res/img/rollos_down.jpg" alt="Jalousien">
                                          </a>
                                            <p><h3>Jalousien</h3></p>
                                        </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
</section>
