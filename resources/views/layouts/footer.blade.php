<div class="row mx-0">
    <div class="col-md-8">
        {{ __('messages.all_rights_reserved') }} &copy;{{ date('Y') }}
        <a href="{{ getSettingValue('company_url') }}">{{ html_entity_decode(getSettingValue('application_name')) }}</a>
    </div>
    <div class="col-md-4">
        <span class="float-right">{{ getCurrentVersion() }}</span>
    </div>
</div>
