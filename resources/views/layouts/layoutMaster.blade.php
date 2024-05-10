@isset($pageConfigs)
{!! Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
$configData = Helper::appClasses();
@endphp

@isset($configData["layout"])
@include((( $configData["layout"] === 'horizontal') ? 'layouts.horizontalLayout' :
(( $configData["layout"] === 'blank') ? 'layouts.blankLayout' :
(($configData["layout"] === 'front') ? 'layouts.layoutFront' : 'layouts.contentNavbarLayout') )))
@endisset
