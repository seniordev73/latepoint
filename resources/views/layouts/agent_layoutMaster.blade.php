@isset($pageConfigs)
{!! agent_Helper::updatePageConfig($pageConfigs) !!}
@endisset
@php
$configData = agent_Helper::appClasses();
@endphp

@isset($configData["layout"])
@include((( $configData["layout"] === 'agent_horizontal') ? 'layouts.agent_horizontalLayout' :
(( $configData["layout"] === 'blank') ? 'layouts.blankLayout' :
(($configData["layout"] === 'front') ? 'layouts.layoutFront' : 'layouts.agent_contentNavbarLayout') )))
@endisset
