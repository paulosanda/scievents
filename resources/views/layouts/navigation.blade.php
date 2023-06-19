<!-- This is an example component -->
<div class="max-w-2xl mx-auto">

	<aside class="w-64" aria-label="Sidebar">
		<div class="px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 bg-gray-900">
			<ul class="space-y-2">
                <li>
                    <a href="{{ route('conference.room.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fas fa-door-open w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    <span class="ml-3">Salas</span>
                    </a>
                </li>
				<li>
					<a href="{{ route('coffee.lounges.index')}} " class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-coffee w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
						<span class="flex-1 ml-3 whitespace-nowrap">Espaços de café</span>
					</a>
				</li>
				<li>
					<a href="{{ route('participations.create') }} "
						class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
						<i class="fas fa-user w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
						<span class="flex-1 ml-3 whitespace-nowrap">Cadastrar participantes</span>
					</a>
				</li>
				<li>
					<a href="{{ route('persons.index') }}"
						class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
						<i class="fas fa-users w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>

						<span class="flex-1 ml-3 whitespace-nowrap">Participantes</span>
					</a>
				</li>
				<li>
					<a href="{{ route('logout') }}"
						class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-sign-out-alt w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
						<span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</aside>
</div>
