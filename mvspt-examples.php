            <h3>Examples</h3>
               <p>To cater for as many people as possible, we will accept both strategies written out in English, formatted as <a class="plainlink" href="http://en.wikipedia.org/wiki/Pseudocode">pseudocode</a>, and also those written in code (Java, C, C++ and Python). If the strategy is being written in a programming language, it must extend the <code>Strategy</code> class:</p>
               <p><a class="link" href="https://github.com/theoboyd/mvspt/blob/master/src/strategy/Strategy.java">Strategy framework</a> (Java abstract class on GitHub)</p>
               <p>Otherwise, for pseudocode, just keep to the style in the examples provided:</p>
               <div id="ex-tab1" class="buttonbar">
                  <div class="tabbar">
                     <a class="button tab default">Pseudocode</a>
                     <a class="button tab" href="javascript:switchto('ex-tab1', 'ex-tab2')">Java</a>
                  </div>
                  <?php
                     $file_name = "uploads/Example-Pseudocode-01.txt";
                     $geshi->load_from_file($file_name);
                     $geshi->set_language("java5", true);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <div id="ex-tab2" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ex-tab2', 'ex-tab1')">Pseudocode</a>
                     <a class="button tab default">Java</a>
                  </div>
                  <?php
                     $file_name = "uploads/Example-Java-01.java";
                     $geshi->load_from_file($file_name);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <p>Try downloading one of these examples to get familiar with what a submission should look like. If you haven't done something similar before, it is strongly recommended you download an example and use it as a starting point for your own. You don't even have to change it very much to submit as a successful strategy of your own.</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Pseudocode-01.txt">Example pseudocode strategy</a> (plain text file, .txt)</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Java-01.java">Example Java strategy</a> (Java class, .java)</p>
            <br />
