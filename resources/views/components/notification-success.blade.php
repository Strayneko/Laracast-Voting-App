 @props(['redirect' => false, 'messageToDisplay' => ''])

 <div x-cloak x-data="{
     isOpen: false,
     messageToDisplay: '{{ $messageToDisplay }}',
     showNotification(message) {
         this.messageToDisplay = message
         this.isOpen = true
         setTimeout(() => this.isOpen = false, 4000)
     }
 }" x-transition x-show="isOpen" @keydown.escape.window="isOpen = false"
     x-init="@if($redirect)
     $nextTick(() => showNotification(messageToDisplay))
     @else
     Livewire.on('ideaWasUpdated', (message) => {
         showNotification(message)
     })
     Livewire.on('ideaWasMarkedAsSpam', (message) => {
         showNotification(message)
     })
     Livewire.on('ideaWasMarkedAsNotSpam', (message) => {
         showNotification(message)
     })
     Livewire.on('statusWasUpdated', (message) => {
         showNotification(message)
     })
     Livewire.on('commentWasAdded', (message) => {
         showNotification(message)
     })
     Livewire.on('commentWasUpdated', (message) => {
         showNotification(message)
     })
     Livewire.on('commentWasDeleted', (message) => {
         showNotification(message)
     })
     Livewire.on('commentWasMarkedAsSpam', (message) => {
         showNotification(message)
     })
     Livewire.on('commentWasMarkedAsNotSpam', (message) => {
         showNotification(message)
     })
     @endif"
     class="flex z-20 justify-between max-w-xs md:max-w-sm w-full fixed bottom-0 right-0 bg-white
     rounded-xl shadow-lg border px-6 py-4 mx-2 sm:mx-6 my-8">
     <div class="flex items-center">
         <svg class="text-theme-green h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
         </svg>
         <div class="font-semibold text-gray-500 text-sm sm:text-base ml-2" x-text="messageToDisplay"></div>
     </div>

     <button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
         <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
         </svg>
     </button>
 </div>
