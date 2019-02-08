<?php
use yii\widgets\Menu;
/* @var $this yii\web\View */
$this->title = 'EMIS.DB en';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Business goes digital!</h1>

        <p class="lead">EMIS.DB business application development.</p>
        <div class="lists-no-disc">
        <?php
      echo Menu::widget([
    'items' => [
        ['label' => 'Digital transformation', 'url' => ['site/index','chap'=>1]],
        ['label' => 'Earnings and Investments', 'url' => ['site/index','chap'=>2]],
        ['label' => 'Studio as investment', 'url' => ['site/index','chap'=>3], 'visible' => !Yii::$app->user->isGuest],
        ['label' => 'Digital business instruments', 'url' => ['site/index','chap'=>4]],
        ['label' => 'Technology: Open Source/Low code', 'url' => ['site/index','chap'=>5]],
        ['label' => 'Project development style: Agile/Waterfall', 'url' => ['site/index','chap'=>6]],
        ['label' => 'What we offer', 'url' => ['site/index','chap'=>7]],
       ],
]);
?>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Digital transformation</h2>

                <p>Digital technologies have had widespread and positive economic effects on the global economy. 
                    It is the single most critical issue organizations facing today. It’s disrupting industries, transforming businesses, and creating new competitive differentiation that will last for years.
                </p>

                <p><a class="btn btn-default" href="<?=Yii::$app->urlManager->createUrl(['site/index','chap'=>1])  ?>">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>Earnings and Investments</h2>

                <p>
                <ul>
                    <li>
                        And the pace of change is fast—those that are slow to react are likely to find themselves at a disadvantage to expeditious competitors.                      
                    </li>
                     </li>
                    <li>
                        But digital process is required to provide reliable operation for all business procedures with a big diversity of company's peculiarities.
                        In most situations organisations choose to develop their own software entirely focused on their goals and needs.
                    </li>
                    <li>
                        To become digital the business doesn't need to develop any specific program
                        or jump online to market their businesses or join any fancy tendency that shows up every day.
                        It is good just to look around and find the most problematic or messy place in the business procedures.
                        This problem may lie not necessarily in the management. It may originate  from any field within the business process.
                        Here the question comes: how the information technology may help to solve this specific problem.          
                    </li>
                    <li>
                        The main idea is that this technology grew up to such extent that 
                        it really has solution for any problem of the contemporary economy.
                        This happens because every process,  each concept or business procedure at the contemporary enterprise may be described
                        as an algorithm with the unlimited number of components. 
                        This solution can be found easily just with the brief research of the weaknesses  in the business flow.
                        The view from this perspective at the actual problem should be taken and it may be acquired with the short consultancy from the professional.
                    </li>
                       
                </ul>
                </p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>Digital business instruments</h2>

                <p>
                <ul>
                    <li>
                        Digital world provides software that may cover any aspect of the contemporary enterprise.
                        Many types of programmatic solutions gained the conceptual names.
                        They are successfully used at the companies and became indispensable part of the whole business.
                        Some of them became the essential element providing the continuous functioning of all the services and departments.
                    </li>
                    <li>
                        Usually the real life enterprise has so many specific elements and complexities
                        that out-of-the-box solution may not cover entirely all the process or it requires some efforts for its customisation. 
                        Often the original tool may cover all the aspects and particularities in the business 
                        and also seamlessly be integrated in the existing procedures and already functioning software.
                    </li>
                    <li>
                        The hardware and software necessary to create these software solutions has become increasingly easy to use and afford.
                        This society offers a huge variety of tools and ready-made components for software development. This reduces work time to the unprecedented rates.
                    </li>
                    <li>
                        When we choose web implementation for our corporate application we obtain even more opportunities.
                    </li>
                    
                </ul>
                    
                </p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Technology: Open Source/Low code</h2>

                <p>
                <ul>
                    <li>
                        Several technologies  in the software development industry now exist at the market.
                        All of them are built to achieve the main goal:  to bring about the effectively working product
                        in the shortest time with the least programmer effort cost.
                        These technologies may be attributed to the two general trends: low code and open source types.
     
                    </li>
                    <li>
                         Low-code development platforms reduce the amount of traditional hand-coding, enabling accelerated delivery of business applications.
                        This technology brings all the supplementary services to the simple functions
                        providing for the programmer to focus on the actual product building.
                        Usually it implements graphical tools for quick and clear result.
                        The drawback for this type of technology is that usually it is closed corporate society 
                        with the strict restriction on the access to the actual code neither for customer nor for the programmer.
                        
                    </li>
                    <li>
                        Open source is a huge variety of different technologies developed by the big programmistic society all over the world.
                        advantages: open code, support from the big society, easy transfer process. 
                    </li>
                </ul>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>Project development style: Agile/Waterfall</h2>

                <p>
                <ul>
                    <li>
                        The waterfall model is a relatively linear sequential design approach for certain areas of engineering design. 
                        Thus the waterfall model maintains that one should move to a phase only when its preceding phase is reviewed and verified.
                        It usually requires lots of efforts at the preliminary phase of the project.
                        The big amount of documentation with all specifications of the entire application.
                        The problem may occur because the customers may not know exactly what their requirements are
                        before they see working software. 
                    </li>
                    <li>
                        Agile software development is an approach to software development
                        under which requirements and solutions evolve through the collaborative effort of self-organizing
                        and cross-functional teams and their customer  and end users.
                        Agile brings about adaptive planning, evolutionary development, empirical knowledge,
                        and continual improvement, and it encourages rapid and flexible response to change.
                        
                    </li>
                    <li>
                        We follow the agile way because we found that contemporary business often finds itself in the following situation:
                        People determined the urgent need for the informational tool to be implemented for solving the acute problems
                        but the lack of time and confidence always postpone the work on it. The management finds the ways to thoroughly plan 
                        the functionality and sometimes even interface of the future application. Often good solution may wait for years
                        compelling the people to struggle with the obvious deficiencies in the everyday mode.
             
                    </li>
                </ul>
                    
                </p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
           <div class="col-lg-4">
                <h2>What we offer</h2>

                <p> Easy and quick solution for any informational needs.
                    <ul>
                        <li>
                            Peer review of the Experienced business analytics                            
                        </li>
                        <li>
                            Quick, working and descriptive prototype 
                        </li>
                        <li>
                            software development Using Recent technologies
                            (for now HTML5 responsive design with the PHP backend technology on the Yii-2 framwork)
                        </li>
                        <li>
                            agile project development with the fast feedback at all stages of the run
                        </li>
                        <li>
                            efficient product with the responsive support 
                        </li>
                    
                    </ul>
                </p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Revolution &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
