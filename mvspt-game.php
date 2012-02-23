            <h3>The Game</h3>
            <p>The game to be played is a variant of the Prisoner's Dilemma that incorporates social and material components. You will have the chance to write an algorithm that can play this game against other algorithms (strategies) submitted by players.</p>
            <p>We will gradually build up the game description. First we start with the original Prisoner's Dilemma:</p>
            <h4>Prisoner's Dilemma</h4>
            <blockquote>Two people are arrested for committing the same crime, but the police do not possess enough information for a conviction. They are separated such that they cannot communicate with each other. The police offer both of them the same deal &mdash; if one testifies against their partner (defects / betrays), and the other remains silent (cooperates / assists), the betrayer goes free and the cooperator receives the full one-year sentence. If both remain silent, both are sentenced to only one month in jail for a minor charge. If each betrays the other, each receives a three-month sentence as they will be guaranteed early release by the prosecution. Each prisoner must choose either to betray or remain silent; the decision of each is kept quiet.</blockquote>
            <p>Or, more simply:</p>
            <table>
               <tr>
                 <th></th>
                 <th>Prisoner B cooperates</th>
                 <th>Prisoner B defects</th>
               </tr>
               <tr>
                 <th>Prisoner A cooperates</th>
                 <td class="mathcell">Each serves 1 month</td>
                 <td class="mathcell">A serves 1 year; B goes free</td>
               </tr>
               <tr>
                 <th>Prisoner A defects</th>
                 <td class="mathcell">A goes free; B serves 1 year</td>
                 <td class="mathcell">Each serves 3 months</td>
               </tr>
            </table>
            <p>Now, if we were to give some relative numerical scores instead to each we could simplify it further. Note, we assume that staying in prison longer is worse, so a smaller sentence gives us a higher score. Take the meaning of (5, 0) to mean player A wins 5 points and player B wins 0:</p>
            <table>
               <tr>
                 <th></th>
                 <th>Player B cooperates</th>
                 <th>Player B defects</th>
               </tr>
               <tr>
                 <th>Player A cooperates</th>
                 <td class="mathcell">(3, 3)</td>
                 <td class="mathcell">(0, 5)</td>
               </tr>
               <tr>
                 <th>Player A defects</th>
                 <td class="mathcell">(5, 0)</td>
                 <td class="mathcell">(1, 1)</td>
               </tr>
            </table>
            <p>Finally, we'll generalise this table and turn the numbers into variables so that we can change them later &mdash; the rules for the tournament can then be determined in terms of the generalised values:</p>
            <table>
               <tr>
                 <th></th>
                 <th>Player B cooperates</th>
                 <th>Player B defects</th>
               </tr>
               <tr>
                 <th>Player A cooperates</th>
                 <td class="mathcell">(R, R)</td>
                 <td class="mathcell">(S, T)</td>
               </tr>
               <tr>
                 <th>Player A defects</th>
                 <td class="mathcell">(T, S)</td>
                 <td class="mathcell">(P, P)</td>
               </tr>
            </table>
