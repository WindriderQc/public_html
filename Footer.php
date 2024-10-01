

<footer class="clearfix">

		<div class="row">

			<div class="col">

				<div class="module-content">

					<h4>Legacy</h4>

					<ul>					

                    <?php

                           echo "<li><a href=\"old/index.php\"> Old Website </a></li>";

                           echo "<li><a href=\"" . $LeagueGeneralMenu['OutputName'] . ".stc\">"  . $TopMenuLang['STHSClientLeagueFile'] . "</a></li>";

                        ?>

					</ul>

				</div>

			</div>

			<div class="col">

				<div class="module-content">

					<div class=""><img id="MenuProLeagueImage" src="<?php echo $ImagesCDNPath;?>/images/proleague.png" width="90" height="90" alt="Pro League Menu"></div>

					<ul>

                        <li><a href="#" class="MenuAfterImage"><?php echo $TopMenuLang['ProLeague'];?></a><ul>

                        <li><a href="Standing.php"><?php echo $TopMenuLang['Standing'];?></a></li>

                        <li><a href="Schedule.php"><?php echo $TopMenuLang['Schedule'];?></a></li>

                        <li><a href="PlayersStat.php?Order=P&MinGP&Max=50"><?php echo $TopMenuLang['PlayersLeader'];?></a></li>

                        <li><a href="GoaliesStat.php?Order=P&MinGP&Max=10"><?php echo $TopMenuLang['GoaliesLeader'];?></a></li>

                        <li><a href="IndividualLeaders.php"><?php echo $TopMenuLang['IndividualLeaders'];?></a></li>

                        <li><a href="PlayersStat.php"><?php echo $TopMenuLang['AllPlayersStats'];?></a></li>

                        <li><a href="GoaliesStat.php"><?php echo $TopMenuLang['AllGoaliesStats'];?></a></li>

                        <li><a href="TeamsStat.php"><?php echo $TopMenuLang['TeamsStats'];?></a></li>

                        <li><a href="PlayersInfo.php?Type=1"><?php echo $TopMenuLang['PlayersInformation'];?></a></li>

                        <li><a href="Finance.php"><?php echo $TopMenuLang['Finance'];?></a></li>

                        <li><a href="TeamSalaryCapDetail.php?Team=<?php echo $CookieTeamNumber ?>"><?php echo $TopMenuLang['TeamContractsOverview'];?></a></li>

                        <li><a href="PowerRanking.php"><?php echo $TopMenuLang['PowerRanking'];?></a></li>

                        <?php If ($MenuQueryOK == True){if (file_exists($AllStarDatabaseFile)){echo "<li><a href=\"Boxscore.php?Game=9999\">" . $TopMenuLang['AllStar'] . "</a></li>";}

                        elseif (file_exists($LeagueGeneralMenu['OutputName']."-AllStar.".$LeagueGeneralMenu['OutputFileFormat'])){echo "<li><a href=\"".$LeagueGeneralMenu['OutputName']."-AllStar.".$LeagueGeneralMenu['OutputFileFormat']."\">" . $TopMenuLang['AllStar'] . "</a></li>";}}?>



					</ul>

				</div>

			</div>

           

			<div class="col-4 bg-orange">

				<div class="module-content">

                    <h5>Ligue de Hockey Simulé</h5>

                    <h5>Quebec City</h5>

					<ul >

						<li>

                            <div class="logo "><a href="index.php"> <img src="images/lhsqc_logo_2.png" alt="LHSQC" class="footer-logo"></a> </div>

                        </li>

					</ul>

                </div>

			</div>

		</div>

	</footer>



<!-- Copyright -->

<div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">

        <div class="mt-1">

        <?php 

        If (isset($Footer) == True){

            echo $Footer . $LeagueOwner;



            If (file_exists($DatabaseFile) == True){

                try{

                    echo " - " . $DatabaseCreate;

                    If (isset($LeagueGeneralMenu) == True){

                        echo	$LeagueGeneralMenu['DatabaseCreationDate'];

                    }

                } catch (Exception $e) {}

            }

        }

        If (isset($PerformanceMonitorStart)){

            echo "<script>  console.log(\"STHS Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . " - Peak Memory Usage : " . round(memory_get_peak_usage() / 1024) . "KB  - Peak Memory Usage : " . round(memory_get_peak_usage(true) / 1024) . "KB \");  </script>";}

        ?> </a>

        </div>

    </div>





<a href="#" class="scrollup">Back to the Top</a>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.10.0/p5.min.js"></script>



</body>

</html> 