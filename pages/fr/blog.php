<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">
<head>
    <title>blog</title>
    
    <?php 
        $index="blog"; 
        include("../../includes/connexionBd.php"); 
        include("../../includes/header.php"); 
        session_start();
    ?>
    <section id="helm" >

        <div class="helm-container">
          <?php include("../../includes/menu.php"); ?>
 
    <style type="text/css">
      body > .grid {
        height: 100%;
      }
      .columnForm {
        max-width: 450px;
      }
    </style>
    <body>
        <div class="ui inverted horizontal segment">
            <div class="ui very relaxed stackable page grid">
                <div class="row">
                    <div class="column">
                    <div class="ui divider horizontal"></div>
                    <h1 class="center aligned ui inverted header">
                    <h1 class="center aligned ui inverted header orange">
                        Les meilleurs articles du blog
                    </h1>
                </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <h3 class="ui inverted header">How to Win Your Cats Attention</h3>
                <p>Getting your cat to notice you is a large part of being a pet owner. Although I have a lot of patience for writing things about cats, perhaps this might be enough body copy to make this section of text look filled out.</p>
                <p>This and other tips can be found in our newsletter, amazing right?</p>
                <div class="ui horizontal divider"></div>
                    <div class="ui orange inverted animated button">
                        <div class="visible content">Lire plus</div>
                        <div class="hidden content"><i class="right arrow icon"></i></div>
                    </div>
                    <div class="ui inverted section divider"></div>
                    <h3 class="ui inverted header">Plus d'articles</h3>
                    <div class="ui inverted animated selection list">
                        <div class="item">
                            How to win in a fight with a cat
                            <div class="right floated">Jan 20, 2023</div>
                        </div>
                        <div class="item">
                            A Supposedly Fun Cat Toy I will Never Buy Again
                            <div class="right floated">Jan 1, 2023</div>
                        </div>
                        <div class="item">
                            Much ado about yarn
                            <div class="right floated">Dec 20, 2022</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ui horizontal divider"></div>
    <div class="ui horizontal divider"></div>
    <div class="ui container">
        <div class="ui stackable grid">
            
        <div class="ui four wide center aligned column">

                <div class="ui card">
                    <div class="image dimmable">
                        <div class="ui dimmer transition fade out hidden" style="display: none;">
                            <div class="content">
                                <div class="center">
                                <div class="ui inverted button">Add Friend</div>
                                </div>
                            </div>
                        </div>
                        <img src="../../img/1.jpg">
                    </div>
                    <div class="content">
                        <div class="header">Title</div>
                        <div class="meta">
                            <a class="group">Meta</a>
                        </div>
                        <div class="description">One or two sentence description that may go to several lines</div>
                    </div>
                    <div class="extra content">
                        <a class="right floated created" style="margin-left:15px;"><i class="ui icon thumbs up green"></i>10</a>
                        <a class="right floated created"><i class="ui icon thumbs down red"></i>15</a>
                        <a href="vewarticle.php?test=1" class="friends">
                            Lire </i>
                        </a>
                    </div>
                </div>
            </div>

            
                <div class="ui four wide column">
                    <div class="ui card">
                        <div class="image dimmable">
                            <div class="ui dimmer transition fade out hidden" style="display: none;">
                                <div class="content">
                                    <div class="center">
                                    <div class="ui inverted button">Add Friend</div>
                                    </div>
                                </div>
                            </div>
                            <img src="../../img/1.jpg">
                        </div>
                        <div class="content">
                            <div class="header">Title</div>
                            <div class="meta">
                                <a class="group">Meta</a>
                            </div>
                            <div class="description">One or two sentence description that may go to several lines</div>
                        </div>
                        <div class="extra content">
                            <a class="right floated created" style="margin-left:15px;"><i class="ui icon thumbs up green"></i>10</a>
                            <a class="right floated created"><i class="ui icon thumbs down red"></i>15</a>
                            <a href="vewarticle.php?test=1" class="friends">
                                Lire </i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="ui four wide column">
                    <div class="ui card">
                        <div class="image dimmable">
                            <div class="ui dimmer transition fade out hidden" style="display: none;">
                                <div class="content">
                                    <div class="center">
                                    <div class="ui inverted button">Add Friend</div>
                                    </div>
                                </div>
                            </div>
                            <img src="../../img/1.jpg">
                        </div>
                        <div class="content">
                            <div class="header">Title</div>
                            <div class="meta">
                                <a class="group">Meta</a>
                            </div>
                            <div class="description">One or two sentence description that may go to several lines</div>
                        </div>
                        <div class="extra content">
                            <a class="right floated created" style="margin-left:15px;"><i class="ui icon thumbs up green"></i>10</a>
                            <a class="right floated created"><i class="ui icon thumbs down red"></i>15</a>
                            <a href="vewarticle.php?test=1" class="friends">
                                Lire </i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="ui four wide column">
                    <div class="ui card">
                        <div class="image dimmable">
                            <div class="ui dimmer transition fade out hidden" style="display: none;">
                                <div class="content">
                                    <div class="center">
                                    <div class="ui inverted button">Add Friend</div>
                                    </div>
                                </div>
                            </div>
                            <img src="../../img/1.jpg">
                        </div>
                        <div class="content">
                            <div class="header">Title</div>
                            <div class="meta">
                                <a class="group">Meta</a>
                            </div>
                            <div class="description">One or two sentence description that may go to several lines</div>
                        </div>
                        <div class="extra content">
                            <a class="right floated created" style="margin-left:15px;"><i class="ui icon thumbs up green"></i>10</a>
                            <a class="right floated created"><i class="ui icon thumbs down red"></i>15</a>
                            <a href="vewarticle.php?test=1" class="friends">
                                Lire </i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="ui four wide column">
                    <div class="ui card">
                        <div class="image dimmable">
                            <div class="ui dimmer transition fade out hidden" style="display: none;">
                                <div class="content">
                                    <div class="center">
                                    <div class="ui inverted button">Add Friend</div>
                                    </div>
                                </div>
                            </div>
                            <img src="../../img/1.jpg">
                        </div>
                        <div class="content">
                            <div class="header">Title</div>
                            <div class="meta">
                                <a class="group">Meta</a>
                            </div>
                            <div class="description">One or two sentence description that may go to several lines</div>
                        </div>
                        <div class="extra content">
                            <a class="right floated created" style="margin-left:15px;"><i class="ui icon thumbs up green"></i>10</a>
                            <a class="right floated created"><i class="ui icon thumbs down red"></i>15</a>
                            <a href="vewarticle.php?test=1" class="friends">
                                Lire </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
          
            include("../../includes/footer.php");
          
        ?>