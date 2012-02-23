            <h4>Dual Game Social Prisoner's Dilemma</h4>
            <p>We want to build the two components, of materialistic and social play, into a dual game where each player will play two games at once. The strategy should aim to win both a material prize and also a social (charitable) prize, depending on the player's social inclination. This inclination to one side or the other is determined by a social coefficient in the range [0, 1] which is referred to as <code>lambda</code> or $\lambda$. Player A's coefficient is $\lambda_A$ and player B's coefficient is $\lambda_B$.</p>
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
