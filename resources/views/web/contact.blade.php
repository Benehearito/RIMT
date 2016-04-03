@extends('weblayout')

@section('content_primary')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-home  panel-info panel-myinfo panel-help sombra efecto-trans">
                        <div class="panel-body">
                            <h1 class="panel-title">Formulario de contacto</h1><br>
                            <p>Si tienes dudas, inquietudes, preguntas o simplemente quieres dejarnos tus comentarios o aportes,
                                diligencia este formato y te responderemos a la brevedad del caso; recuerda que tus observaciones son sumamente importantes para nosotros.</p>
                            <br>
                            <div class="status alert alert-success" style="display: none"></div>
                            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" required="required" placeholder="Nombre" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" required="required" placeholder="Correo electrónico" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Mensaje"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger btn-md">Enviar mensaje</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <h2>Buscanos en la redes sociales!!!</h2>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="social">
                                        <li><a href="#" class="link facebook"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#" class="link google-plus"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="link pinterest"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a href="#" class="link linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#" class="link twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="link youtube"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <br><br>
                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default panel-info panel-myinfo panel-help sombra efecto-trans">
                        <div class="panel-body">
                            <h2>Datos de contacto</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Empresa</strong><br>
                                        Calle Tenerife, 2, 38419<br>
                                        Los Realejos<br>
                                        Santa Cruz de Tenerife, España<br>
                                        <abbr title="Teléfono">Tel:</abbr> 646-541-774
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address>
                                        <strong>Depatamento Web.</strong><br>
                                        Lunes a Viernes de 9 a 14h<br>
                                        <abbr title="Teléfono">Tel:</abbr> 667-337-808
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default  panel-info panel-myinfo panel-help sombra efecto-trans">
                        <div class="panel-body">
                            <h2>Donde encontrarnos???</h2>
                            <p>
                                <iframe frameborder="0" height="350" marginheight="0" marginwidth="0" scrolling="no"
                                        src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=C%2F+Tenerife+N%C2%BA+2+los+Realejos&amp;aq=&amp;sll=28.444464,-15.853272&amp;sspn=4.022732,8.453979&amp;ie=UTF8&amp;hq=&amp;hnear=Calle+Tenerife,+2,+38419+Los+Realejos,+Santa+Cruz+de+Tenerife&amp;t=m&amp;z=14&amp;ll=28.38048,-16.583995&amp;output=embed" width="100%">
                                </iframe>
                                <br/>
                                <small><a style="color: #0000ff; text-align: left;" href="https://maps.google.es/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=C%2F+Tenerife+N%C2%BA+2+los+Realejos&amp;aq=&amp;sll=28.444464,-15.853272&amp;sspn=4.022732,8.453979&amp;ie=UTF8&amp;hq=&amp;hnear=Calle+Tenerife,+2,+38419+Los+Realejos,+Santa+Cruz+de+Tenerife&amp;t=m&amp;z=14&amp;ll=28.38048,-16.583995">
                                        Ver mapa más grande</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('content_secundary')

@endsection
