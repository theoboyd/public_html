                  <h3>Terms And Conditions</h3>
                  <div class="vsmallprint">
                  <p>These are the restrictions that affect the tournament and strategies ("Strategy Terms"):</p>
                  <ol>
                     <li>Taking the meaning of (X, Y) to be that player A receives X and player B receives Y, the payoff matrix used will be:
                        <table>
                           <tr>
                             <th></th>
                             <th>Player B cooperates</th>
                             <th>Player B defects</th>
                           </tr>
                           <tr>
                             <th>Player A cooperates</th>
                             <td class="mathcell">((1-$\lambda_A$)R, $\lambda_A$M), ((1-$\lambda_B$)R, $\lambda_B$M)</td>
                             <td class="mathcell">((1-$\lambda_A$)S, $\lambda_A$M), ((1-$\lambda_B$)T, $\lambda_B$M')</td>
                           </tr>
                           <tr>
                             <th>Player A defects</th>
                             <td class="mathcell">((1-$\lambda_A$)T, $\lambda_A$M'), ((1-$\lambda_B$)S, $\lambda_B$M)</td>
                             <td class="mathcell">((1-$\lambda_A$)P, $\lambda_A$M'), ((1-$\lambda_B$)P, $\lambda_B$M')</td>
                           </tr>
                        </table>
                     </li>
                     <li>$T > R > P > S$ &mdash; this makes it clear that while the temptation is to betray, it will be a better game for players to mostly cooperate.</li>
                     <li>$R > \frac{T + S}{2}$ &mdash; to prevent players from simply alternating between defecting and cooperating, we give them a better average score when mutually cooperating.</li>
                     <li>$M > \frac{R + P}{2}$ &mdash; for there to be a strong incentive to play the social route.</li>
                     <li>$R > M$ &mdash; to give a more realistic representation of today's society, where a material prize is often valued more than a charitable one.</li>
                     <li>$M' = S$ &mdash; to remove the incentive to set the social coefficient to its maximum value and then defect, we punish defection in the social game as strongly as we do the Sucker in the material game.</li>
                     <li>$T = 5$, $R = 3$, $P = 1$, $S = 0$, $M = 2.5$ and $M' = 0$.</li>
                     <li>The social coefficient is a discrete value to simplify the system. It is fixed to one of six values: $\lambda \in \{0.0, 0.2, 0.4, 0.6, 0.8, 1.0\}$.</li>
                     <li>We will limit by how much strategies may change their $\lambda$ per round using $\delta \in [-1.0, 1.0]$. The specific value will be included in the framework code and is small to prevent abrupt changes from total material to total social contribution and vice versa.</li>
                     <li>For the sake of privacy and the more accurate modelling of the ability of players to discern each others' strategies, we will use a variable to represent how deeply into an opponent's recent move history, $\chi_{move}$, and social coefficient history, $\chi_{coeff}$ the player can read. We will aim to keep $\chi_{move} = n$ (all visible) but have $\chi_{coeff} \geq 1$.</li>
                     <li>It is not permitted to attempt to cooperate just after having defected and reduced one's social coefficient. Similarly, it is not permitted to attempt to defect just after having cooperated and raised one's social coefficient. Both of these measures are in place to prevent undermining the concept of the game and if a strategy attempts to perform one of these combinations, it is invalid.</li>
                     <li>The winner of the material prize is the person that submitted the strategy which obtained the highest total score in the Prize-eligible Tournament. Total score means the value $\tau$ in the following formula: $\tau$ = $(1 - \gamma)$material_total + $\gamma$social_total, where the societal social coefficient, $\gamma$ is 0.5 for the Prize-eligible Tournament.</li>
                     <li>There is no personal winner of the social prize; the donation to charity will be managed by the tournament organisers and attributed proportionally to people whose strategies contributed socially.</li>
                     <li>The "Prize-eligible Tournament" is the tournament in which the winner will be able to receive a prize. "Friendly Tournaments" are played only for competition and for the opportunity to improve strategies before the Prize-eligible Tournament. The break between the two types of tournament depends on participation rates but will likely last a number of days and will be announced on this page.</li>
                     <li>A number of "In-house Strategies" will be seeded into the tournaments which will not be eligible to win any prizes but will assist in making the strategy pool more active. These include, but are not limited to, "Tit-For-Tat" and its variants as above, "Always Cooperates", "Always Defects" and "Always Random".</li>
                  </ol>
                  <p>These are the terms and conditions of the competition and prizes ("Competition Terms"):</p>
                  <ol>
                     <li>To submit a strategy there are no restrictions on age, residence, etc.</li>
                     <!--li>The above notwithstanding, to be eligible to receive a monetary prize you must be: (a) aged 18 or over at the time of submission; (b) a full-time student or member of staff of Imperial College London (The Imperial College of Science, Technology and Medicine, henceforth the "University")<php echo $department_list></li-->
                     <li>Participants agree to having their full name (but not any contact details) listed along with their scores online for viewing by other participants and interested parties. This is integral to the study.</li>
                     <li>Submissions will only be accepted via this webpage.</li>
                     <li>Submissions written in a language other than Java will be converted to Java to run in the framework. While every effort will be made to avoid translation errors, if any occur that prevent the strategy from otherwise having won, the organiser waives any responsibility for prize loss.</li>
                     <li>Submissions will close on <?php echo $end_date ?> at 23:59 GMT.</li>
                     <li>Maximum <?php echo $max_entries_pp ?> entries per person.</li>
                     <li>If participants wish to be eligible for a prize, they <strong><em>must</em></strong> include their name and email address. The winner will be contacted by email. If the winner cannot be contacted and/or cannot receive the prize for any other reason, the next best scoring submission will be considered, and so on.</li>
                     <li>The organiser will endeavour to deliver the prize as quickly as possible, but a delivery time cannot be guaranteed.</li>
                     <li>Strategies that break any Strategy Terms will be discarded. Participants may, if there is time, be given the chance to, and assistance in, correcting, improving and/or resubmitting their work.</li>
                     <li>Fraudulent or plagiarised entries will disqualify <strong><em>all</em></strong> current and future entries belonging to the participant.</li>
                     <li>The winner selection will be interpreted using the Strategy Terms and other rules on this page but the decision of the organiser is final in the case of dispute or uncertainty.</li>
                     <li>Prizes are non-transferable and non-exchangeable. However, if the stated prize is not available, an alternative prize of value acceptable to both the recipient and organiser may need to be provided as a replacement.</li>
                     <li>Anybody can find out who won the competition by emailing the organiser.</li>
                     <li>The competition organiser is Theodore Boyd who is in the University's Department of Computing and can be contacted via the details on <a href="index.php" class="legallink">his homepage.</a></li>
                  </ol>
                  <p>These rules may be subject to change without notice. If a change is made that significantly impacts those submissions already made, we will contact participants that have provided details for that purpose. Last updated on <?php echo $tsandcs_update ?>.</p>
                  </div>
