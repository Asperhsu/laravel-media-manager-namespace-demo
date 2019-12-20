<media-manager-modal inline-template class="media-manager-container">
    <div v-cloak>
        <div v-if="inputName">@include('MediaManager::extras.modal')</div>
        <media-modal item="image" :name="inputName"></media-modal>
    </div>
</media-manager-modal>
