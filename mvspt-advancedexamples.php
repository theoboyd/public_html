            <h3>Advanced Examples</h3>
               <p>Here are some more involved examples to take a look at:</p>
               <div id="ae-tab1" class="buttonbar">
                  <div class="tabbar">
                     <a class="button tab default">Pseudocode</a>
                     <a class="button tab" href="javascript:switchto('ae-tab1', 'ae-tab2')">Java</a>
                     <!-- a class="button tab" href="javascript:switchto('ae-tab1', 'ae-tab3')">C++</a-->
                  </div>
                  <?php
                     $file_name = "uploads/Example-Pseudocode-02.txt";
                     $geshi->load_from_file($file_name);
                     $geshi->set_language("java5", true);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <div id="ae-tab2" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ae-tab2', 'ae-tab1')">Pseudocode</a>
                     <a class="button tab default">Java</a>
                     <!--a class="button tab" href="javascript:switchto('ae-tab2', 'ae-tab3')">C++</a-->
                  </div>
                  <?php
                     $file_name = "uploads/Example-Java-02.java";
                     $geshi->load_from_file($file_name);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <!--div id="ae-tab3" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ae-tab3', 'ae-tab1')">Pseudocode</a>
                     <a class="button tab" href="javascript:switchto('ae-tab3', 'ae-tab2')">Java</a>
                     <a class="button tab default">C++</a>
                  </div>
                  <?php
                     //$file_name = "uploads/Example-Cpp-02.java";
                     //$geshi->load_from_file($file_name);
                     //echo $geshi->parse_code();
                  ?>
               </div-->
               <p>Note how they make use of a <code>NashEquilibrium</code> module to obtain the Nash equilibrium for the particular lambda. This and other useful methods can be found in the source code for the MVSPT package which is available for study below. You may make use of any code that a <code>Strategy</code> class would have access to. If you are writing in pseudocode, you can assume common mathematical functions and the <code>NashEquilibrium</code> module to obtain the Nash equilibrium for a particular lambda as above.</p>
               <p><a class="gold" href="uploads/download.php?path=MVSPT-Src.zip">MVSPT Java framework source</a> (Zip archived Java code, .zip)</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Pseudocode-02.txt">Advanced example pseudocode strategy</a> (plain text file, .txt)</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Java-02.java">Advanced example Java strategy</a> (Java class, .java)</p>
            <br />
