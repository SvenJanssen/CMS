@extends('layouts.base')

@section('submenuItems')
    <a href="{{ URL::route('users.create') }}" id="newUserButton" class="linkWithIcon"><i class="glyphicon glyphicon-remove"></i>Nieuwe klant toevoegen</a>
    <a href=""><i class="glyphicon glyphicon-search"></i>Klant zoeken</a>
    <ul id="submenuheader">
        <li><a id="editUserButton" ><i class="glyphicon glyphicon-pencil"></i>Gegevens wijzigen</a></li>
        <li><a href=""><i class="glyphicon glyphicon-calendar"></i>Afspraak inplannen</a></li>
        <li><a href=""><i class="glyphicon glyphicon-envelope"></i>E-mail sturen</a></li>
    </ul>
@stop
@section('main')
<div class="col-md-4">
    <div class="standardBox borderedBox">
        <div class="title col-md-12">Klant toevoegen</div>
        <div class="borderedBoxInner no-padding fixedHeight">
            {{Form::open(array('url' => '/users', 'role' => 'form', 'class' => 'form-horizontal'))}}  
            <div class="form-divider no-margin-top">Naam</div>
            <div class="form-group radio-holder">
                {{Form::label('saluation', 'Aanhef:', array('class' => 'col-md-4'))}}
                <div class="radio-holder items3 col-md-8">
                    <label class="radio-inline col-md-3">
                        <input type="radio" name="saluation" value="fam" />fam.
                    </label>    
                    <label class="radio-inline col-md-3 second">
                        <input type="radio" name="saluation" value="dhr" />dhr.
                    </label>
                    <label class="radio-inline col-md-3 second">
                        <input type="radio" name="saluation" value="mvr" />mvr.
                    </label>                        
                </div>                     
            </div>
            <div class="form-group {{$errors->first('first_name') ? 'has-error' : ''}}">
                {{Form::label('first_name', 'Voornaam:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('first_name', '')}}
                    {{ $errors->first('first_name') ? '<p class="help-block">' . $errors->first('first_name') . '</p>' : '' }}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('name_insertion', 'Tussenvoegsel(s):', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('name_insertion', '')}}
                </div>
            </div>
            <div class="form-group {{$errors->first('last_name') ? 'has-error' : ''}}">
                {{Form::label('last_name', 'Achternaam:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('last_name', '')}}
                    {{ $errors->first('last_name') ? '<p class="help-block">' . $errors->first('last_name') . '</p>' : '' }}
                </div>
            </div>
            <div class="form-divider">Contactgegevens</div>
            <div class="form-group">
                {{Form::label('phone', 'Telefoon vast:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('phone', '')}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('fax', 'Fax:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('fax', '')}}
                </div>
            </div>  
            <div class="form-group">
                {{Form::label('mobile', 'Mobiel:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('mobile', '')}}
                </div>
            </div>  
            <div class="form-group">
                {{Form::label('email', 'E-mailadres:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('email', '')}}
                </div>
            </div> 

            <div class="form-divider">Adresgegevens</div>
            <div class="form-group">
                {{Form::label('country_id', 'Land:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    <div class="select-holder">
                        {{Form::select('country_id', array())}}
                    </div>
                </div>
            </div>
            <div class="form-group {{$errors->first('zipcode') ? 'has-error' : ''}}">
                {{Form::label('zipcode', 'Postcode:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('zipcode', '')}}
                    {{ $errors->first('zipcode') ? '<p class="help-block">' . $errors->first('zipcode') . '</p>' : '' }}            
                </div>
            </div>  
            <div class="form-group {{$errors->first('city') ? 'has-error' : ''}}">
                {{Form::label('city', 'Plaats:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('city', '')}}
                    {{ $errors->first('city') ? '<p class="help-block">' . $errors->first('city') . '</p>' : '' }} 
                </div>
            </div>  
            <div class="form-group {{$errors->first('street') ? 'has-error' : ''}}">
                {{Form::label('street', 'Straat:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::text('street', '')}}
                    {{ $errors->first('street') ? '<p class="help-block">' . $errors->first('street') . '</p>' : '' }} 
                </div>
            </div>   
            <div class="form-group {{$errors->first('house_number') ? 'has-error' : ''}}">
                {{Form::label('house_number', 'Huisnummer:', array('class' => 'col-md-4 control-label'))}}
                <div class="col-md-2">
                    {{Form::text('house_number', '')}}
                </div>    
                {{Form::label('house_number_addition', 'Toevoeging:', array('class' => 'col-md-2 col-md-offset-1 no-padding-left'))}}
                <div class="col-md-3">
                    {{Form::text('house_number_addition', '')}}
                </div>
                {{ $errors->first('house_number') ? '<div class="has-error"><p class="help-block col-md-8 col-md-offset-4">' . $errors->first('house_number') . '</p></div>' : '' }} 
            </div>
            <div class="form-divider">Opmerkingen / voorkeuren</div>
            <div class="form-group">
                {{Form::label('comment', 'Opmerkingen:', array('class' => 'control-label col-md-4'))}}
                <div class="col-md-8">
                    {{Form::textarea('comment', '')}}
                </div>
            </div>
            <div class="title">{{Form::submit('Opslaan', array('class' => 'pull-right'))}}<i class="pull-right glyphicon glyphicon-chevron-down submit-i"></i></div>
            {{Form::close()}}
        </div>
    </div>    
</div>  
@stop