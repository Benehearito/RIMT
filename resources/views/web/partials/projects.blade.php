<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="heading1">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Microcemento
                </a>
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
            <div class="panel-body">
                @include('web.partials.projects.proyect' , array('gallery'=>$micro , 'name'=>'micro' ,'title' =>'Microcemento'))
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="heading2">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    Cocinas y Baños
                </a>
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
            <div class="panel-body">
                @include('web.partials.projects.proyect' , array('gallery'=>$cocinasybanos , 'name'=>'cocinasybanos' ,'title' =>'Cocinas y Baños'))
            </div>
        </div>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading" role="tab" id="heading3">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Fachadas, Muros y Pavimentos
                </a>
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
            <div class="panel-body">
                @include('web.partials.projects.proyect' , array('gallery'=>$fachcadasymuros, 'name'=>'fachcadasymuros' ,'title' =>'Fachadas, Muros y Pavimentos'))
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading" role="tab" id="heading4">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Impermeabilizaciones y Techos
                </a>
            </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
            <div class="panel-body">
                @include('web.partials.projects.proyect' , array('gallery'=>$imperytechos, 'name'=>'imperytechos' ,'title' =>'Impermeabilizaciones y Techos'))
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="heading5">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Jardines y Barbacoas
                </a>
            </h4>
        </div>
        <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
            <div class="panel-body">
                @include('web.partials.projects.proyect' , array('gallery'=>$jardybarba, 'name'=>'jardybarba','title' =>'Jardines y Barbacoas'))
            </div>
        </div>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading" role="tab" id="heading6">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                    Decoración y Nuevas Tecnologías
                </a>
            </h4>
        </div>
        <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
            <div class="panel-body">
                @include('web.partials.projects.proyect' , array('gallery'=>$decoytec, 'name'=>'decoytec','title' =>'Decoración y Nuevas Tecnologías'))
            </div>
        </div>
    </div>
</div>