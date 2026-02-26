<div class="flex flex-col w-full">
	<div class="-my-2 max-w-full overflow-x-auto wrap-break-word sm:-mx-6 lg:-mx-8">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
			<div class="shadow border-b border-gray-200 sm:rounded-lg w-full">
{{--				 table-fixed--}}
				<table class="min-w-full divide-y divide-gray-200">
					<tbody class="bg-white  dark:bg-gray-700 divide-y max-w-full">
					{{ $slot }}
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
