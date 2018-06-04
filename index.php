<?php
    $subjectPrefix = '[Contato via site]';
    $emailTo = 'gab.teles@hotmail.com';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name    = stripslashes(trim($_POST['form-name']));
        $email   = stripslashes(trim($_POST['form-email']));
        $subject = stripslashes(trim($_POST['form-subject']));
        $message = stripslashes(trim($_POST['form-message']));
        $pattern  = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
        if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
            die("Header injection detected");
        }
        $emailIsValid = preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email);
        if($name && $email && $emailIsValid && $subject && $message){
            $subject = "$subjectPrefix $subject";
            $body = "Nome: $name <br /> Email: $email <br /> Mensagem: $message";
            $headers  = 'MIME-Version: 1.1' . PHP_EOL;
            $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
            $headers .= "From: $name <$email>" . PHP_EOL;
            $headers .= "Return-Path: $emailTo" . PHP_EOL;
            $headers .= "Reply-To: $email" . PHP_EOL;
            $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
            mail($emailTo, $subject, $body, $headers);
            $emailSent = true;
        } else {
            $hasError = true;
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gabriel Teles</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css" rel="stylesheet"/>
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/jquery.fancybox.css" rel="stylesheet" media="screen" />

        <script src="scripts/buoy.min.js"></script>
        <script src="scripts/smooth-scroll.min.js"></script>
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/jquery.fancybox.pack.js"></script>

        <script>
            $(function(){
                smoothScroll.init();
                $('.fancybox').fancybox();
            });
        </script>
    </head>

    <body>
        <header class="section">
            <div class="grid">
                <div class="grid__cell--center unit-12-12 center-content">
                    <img src="images/logo.png" />
                </div>

                <div class="grid__cell unit-12-12 center-content">
                    <h1>Gabriel Teles</h1>
                    <h2>Fullstack Dev</h2>
                    <a data-scroll href="#about" class="nav-button"><i class="fa fa-chevron-down button-down"></i></a>
                </div>
            </div>
        </header>

        <section class="section--full" id="about">
            <div class="grid">
                <div class="grid__cell unit-12-12 center-content">
                    <h3 class='section__title'>Sobre Mim</h3>
                </div>

                <div class="grid__cell grid__cell--center unit-8-12 justify-content">
                    <p>Meu nome é Gabriel Teles e tenho 18 anos.</p>
                    <p>Eu sou um desenvolvedor fullstack e entusiasta de tecnologia e código livre. Tenho experiência em linguagens Web e Desktop como HTML, CSS (LESS, SCSS, SASS), Javascript, C, C++, PHP, Ruby, entre outras. Atualmente busco me aperfeiçoar na utilização de ferramentas de automação.</p>
                    <p>Trabalhei com sistemas de alta confiabilidade envolvendo gerenciamento financeiro de um curso preparatório para concursos e integração com diversos <em>gateways</em> de pagamento, além da implementação de um sistema de votação similar a uma urna eletrônica utilizando a internet.</p>
                    <p>Entre meus hobbies estão o desenvolvimento de jogos utilizando a plataforma RPG Maker &#0150; algum tempo atrás implementei em Ruby o <a href="https://github.com/gabteles/RbTSCP" target="_blank">RbTSCP</a>, motor de xadrez baseado no <a href="http://www.tckerrigan.com/Chess/TSCP/" target="_blank">TSCP</a>, para utilização com o RPG Maker &#0150;, trabalhar em alguns projetos pessoais relacionados a educação e tecnologia e aprender linguagens exotéricas (inclusive cheguei a implementar <a href="https://gist.github.com/gabteles/5996335" target="_blank">Brainfuck</a> e <a href="https://github.com/gabteles/ZombieRB" target="_blank">Zombie</a>). Isso tudo acompanhado de uma boa trilha de Floyd, claro.</p>
                </div>

                <div class="grid__cell unit-12-12 center-content">
                    <a data-scroll href="#skills" class="nav-button"><i class="fa fa-chevron-down button-down"></i></a>
                </div>
            </div>
        </section>

        <section class="section--full" id="skills">
            <div class="grid">
                <div class="grid__cell unit-12-12 center-content">
                    <h3 class='section__title'>Minhas Habilidades</h3>
                </div>
                <div class="grid__cell unit-12-12 center-content circle-section">
                    <div class="grid">
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="circle">
                                <div class="pie-wrapper progress-75">
                                    <span class="label">75%</span>
                                    <div class="pie">
                                        <div class="left-side half-circle"></div>
                                        <div class="right-side half-circle"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <span class="circle__label">HTML5</span>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="circle">
                                <div class="pie-wrapper progress-75">
                                    <span class="label">75%</span>
                                    <div class="pie">
                                        <div class="left-side half-circle"></div>
                                        <div class="right-side half-circle"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <span class="circle__label">CSS3 + SASS</span>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small unit-4-12--small center-content">
                            <div class="circle">
                                <div class="pie-wrapper progress-85">
                                    <span class="label">85%</span>
                                    <div class="pie">
                                        <div class="left-side half-circle"></div>
                                        <div class="right-side half-circle"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <span class="circle__label">Javascript</span>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="circle">
                                <div class="pie-wrapper progress-90 style-2">
                                    <span class="label">90%</span>
                                    <div class="pie">
                                        <div class="left-side half-circle"></div>
                                        <div class="right-side half-circle"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <span class="circle__label">PHP</span>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="circle">
                                <div class="pie-wrapper progress-90">
                                    <span class="label">90%</span>
                                    <div class="pie">
                                        <div class="left-side half-circle"></div>
                                        <div class="right-side half-circle"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <span class="circle__label">C/C++</span>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="circle">
                                <div class="pie-wrapper progress-95">
                                    <span class="label">95%</span>
                                    <div class="pie">
                                        <div class="left-side half-circle"></div>
                                        <div class="right-side half-circle"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                            </div>
                            <span class="circle__label">Ruby</span>
                        </div>
                    </div>
                </div>
                <div class="grid__cell unit-12-12 center-content">
                    <div class="grid">
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/git.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/jquery.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/java.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/mysql.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/sqlite.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/postgresql.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/shellscript.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/windows.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/debian.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/archlinux.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/centos.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/visualstudio.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/phpstorm.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/rubymine.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/netbeans.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/photoshop.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/yii.png"/>
                            </div>
                        </div>
                        <div class="grid__cell unit-2-12 unit-4-12--small center-content">
                            <div class="skill-img">
                                <img src="images/logos/openshift.png"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid__cell unit-12-12 center-content">
                    <a data-scroll href="#education" class="nav-button"><i class="fa fa-chevron-down button-down"></i></a>
                </div>
            </div>
        </section>

        <section class="section--full" id="education">
            <div class="grid">
                <div class="grid__cell unit-12-12 center-content">
                    <h3 class='section__title'>Educação</h3>
                </div>

                <div class="grid__cell grid__cell--center unit-11-12 history-entry">
                    <div class="grid">
                        <div class="grid__cell unit-2-12">
                            <p class="institute">Estácio FACITEC</p>
                            <p class="location">Taguatinga, DF</p>
                        </div>
                        <div class="grid__cell unit-8-12">
                            <p class="title">Graduação: Sistemas de Informação</p>
                            <p class="description">Aptidão a atuar com inovação, planejamento e gerenciamento da informação e da infra-estrutura de tecnologia da informação alinhados às estratégias organizacionais como também com o desenvolvimento e evolução de sistemas de informação e da infra-estrutura de informação e comunicação, ambos aplicados aos processos organizacionais.</p>
                        </div>
                        <div class="grid__cell unit-2-12">
                            <p class="duration">2014 - 2018</p>
                        </div>
                    </div>
                </div>

                <div class="grid__cell unit-12-12 center-content">
                    <a data-scroll href="#profexp" class="nav-button"><i class="fa fa-chevron-down button-down"></i></a>
                </div>
            </div>
        </section>

        <section class="section--full" id="profexp">
            <div class="grid">
                <div class="grid__cell unit-12-12 center-content">
                    <h3 class='section__title'>Experiências Profissionais</h3>
                </div>

                <div class="grid__cell grid__cell--center unit-11-12 history-entry">
                    <div class="grid">
                        <div class="grid__cell unit-9-12">
                            <p class="title"><em>Freelancing</em></p>
                            <p class="description">Trabalhei em sistemas simples, usando majoritariamente HTML, CSS, Javascript e PHP. Em sua grande maioria, foram projetos de sites puramente expositivos. Nessa época existiu pouquíssima preocupação com profissionalismo e em guardar material para posterior apresentação.</p>
                        </div>
                        <div class="grid__cell unit-3-12">
                            <p class="duration">2011 - 2014</p>
                        </div>
                    </div>
                </div>

                <div class="grid__cell grid__cell--center unit-11-12 history-entry">
                    <div class="grid">
                        <div class="grid__cell unit-9-12">
                            <p class="title">Aprendizado Online</p>
                            <p class="description">Desenvolvimento de software em HTML, CSS, Javascript/jQuery, Ajax, PHP usando Yii Framework; Manutenção de software em mesmas condições, utilizando Zend Framework, no entanto; Manutenção de servidores Linux; Implementação de servidores de Streaming/VOD; Elaboração de identidades visuais e logomarcas; Suporte técnico de nível 3.</p>
                        </div>
                        <div class="grid__cell unit-3-12">
                            <p class="duration">Agosto/2014 - Atualmente</p>
                        </div>
                    </div>
                </div>

                <div class="grid__cell unit-12-12 center-content">
                    <a data-scroll href="#portfolio" class="nav-button"><i class="fa fa-chevron-down button-down"></i></a>
                </div>
            </div>
        </section>

        <section class="section--full" id="portfolio">
            <div class="grid">
                <div class="grid__cell unit-12-12 center-content">
                    <h3 class='section__title'>Portfolio</h3>
                </div>

                <div class="grid__cell unit-12-12">
                    <div class="grid">
                        <div class="grid__cell unit-3-12">
                            <div class="thumb center-content">
                                <a href="images/portfolio/ica/image1.png" class="fancybox" rel="ica">
                                    <img src="images/portfolio/ica/thumb.png">
                                </a>
                            </div>

                            <div class="hidden-screens">
                                <a href="images/portfolio/ica/image2.png" class="fancybox" rel="ica"></a>
                                <a href="images/portfolio/ica/image3.png" class="fancybox" rel="ica"></a>
                                <a href="images/portfolio/ica/image4.png" class="fancybox" rel="ica"></a>
                            </div>
                        </div>

                        <div class="grid__cell unit-3-12">
                            <div class="thumb center-content">
                                <a href="images/portfolio/mrm/image1.png" class="fancybox" rel="mrm">
                                    <img src="images/portfolio/mrm/thumb.png">
                                </a>
                            </div>

                            <div class="hidden-screens">
                                <a href="images/portfolio/mrm/image2.png" class="fancybox" rel="mrm"></a>
                            </div>
                        </div>

                        <div class="grid__cell unit-3-12">
                            <div class="thumb center-content">
                                <a href="images/portfolio/salasonline/image1.png" class="fancybox" rel="salasonline">
                                    <img src="images/portfolio/salasonline/thumb.png">
                                </a>
                            </div>

                            <div class="hidden-screens">
                                <a href="images/portfolio/salasonline/image2.png" class="fancybox" rel="salasonline"></a>
                                <a href="images/portfolio/salasonline/image3.png" class="fancybox" rel="salasonline"></a>
                            </div>
                        </div>

                        <div class="grid__cell unit-3-12">
                            <div class="thumb center-content">
                                <a href="images/portfolio/enemv/image1.png" class="fancybox" rel="enemv">
                                    <img src="images/portfolio/enemv/thumb.png">
                                </a>
                            </div>

                            <div class="hidden-screens">
                                <a href="images/portfolio/enemv/image2.png" class="fancybox" rel="enemv"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid__cell unit-12-12 center-content">
                    <a data-scroll href="#contact" class="nav-button"><i class="fa fa-chevron-down button-down"></i></a>
                </div>
            </div>
        </section>

        <section class="section--full" id="contact">
            <div class="grid">
                <div class="grid__cell unit-12-12 center-content">
                    <h3 class='section__title'>Contato</h3>
                </div>

                <div class="grid__cell grid__cell--center unit-6-12 center-content">
                    <?php if(!empty($emailSent)): ?>
                        <p>Sua mensagem foi enviada com sucesso.</p>
                    <?php else: ?>
                        <?php if(!empty($hasError)): ?>
                            <p>Houve um erro no envio, tente novamente mais tarde.</p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <div class="grid__cell grid__cell--center unit-6-12">
                    <form action="index.php#contact" class="form-horizontal" role="form" method="post">
                        <div class="form-group grid">
                            <label for="name" class="grid__cell unit-2-12 control-label">Nome</label>
                            <div class="grid__cell unit-10-12">
                                <input type="text" class="form-control required" id="form-name" name="form-name" placeholder="Nome" />
                            </div>
                        </div>
                        <div class="form-group grid">
                            <label for="email" class="grid__cell unit-2-12 control-label">Email</label>
                            <div class="grid__cell unit-10-12">
                                <input type="email" class="form-control required" id="form-email" name="form-email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group grid">
                            <label for="assunto" class="grid__cell unit-2-12 control-label">Assunto</label>
                            <div class="grid__cell unit-10-12">
                                <input type="text" class="form-control required" id="form-subject" name="form-subject" placeholder="Assunto" />
                            </div>
                        </div>
                        <div class="form-group grid">
                            <label for="mensagem" class="grid__cell unit-2-12 control-label">Mensagem</label>
                            <div class="grid__cell unit-10-12">
                                <textarea class="form-control required" rows="3" id="form-message" name="form-message" placeholder="Mensagem" /></textarea>
                            </div>
                        </div>
                        <div class="form-group grid">
                            <div class="grid__cell unit-2-12"></div>
                            <div class="grid__cell unit-10-12">
                                <button type="submit" class="button">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <footer class="grid">
            <div class="grid__cell unit-6-12 copyright">
                <i class="fa fa-code"></i> com <i class="fa fa-heart"></i> por Gabriel Teles, &copy; 2015
            </div>

            <div class="grid__cell unit-6-12 social-icons right-content">
                <a href="https://www.github.com.br/gabteles" target="_blank"><i class="fa fa-github-square"></i></a>
                <a href="https://fb.com/gabz.teles" target="_blank"><i class="fa fa-facebook-square"></i></a>
            </div>
        </footer>
    </body>
</html>
