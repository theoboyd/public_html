            <h3>Rules And Submission</h3>
               <p>Here is where you can submit your strategy! Before that, there are two sets of terms and conditions that you will need to read and agree to. The first is for the rules of the tournament and format of the submitted strategies, which is based on the description above. The second set of rules concerns the technicalities of the competition, the prizes and a few other restrictions, and are equally important.</p>
               <p><strong>While there are quite a few terms, remember that if you keep to the spirit of the competition above, you will essentially be adhering to them.</strong> Most terms have explanations and reasoning for each restriction. Additionally, if you're writing your code in Java, you will find it helpful to import the MVSPT source into your IDE of choice and then inherit the <code>Strategy</code> class &mdash; this will keep your code conformant with the Strategy Terms.</p>
               <p><span class="fakelink link" id="terms-toggle" onclick="$('#terms-box').toggle(400);">Read the terms and submit a strategy</span></p>
               <div id="terms-box" style="display: none;">
                  <br />
                  <?php include('mvspt-tsandcs.php'); ?>
                  <p><span class="fakelink link" id="upload-toggle" onclick="$('#upload-box').toggle(400);"><img class="icon" src="images/certified.png" alt="" /> I agree to these terms</span>&nbsp;<a class="error" href="index.php"><img class="icon" src="images/rejected.png" alt="" /> Cancel</a></p>
                  <div id="upload-box" style="display: none;">
                     <br />
                     <?php include('mvspt-uploadstrategy.php'); ?>
                  </div>
               </div>
