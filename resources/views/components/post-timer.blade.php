@props(['post'])

<div
	x-data="timeAgo('{{ $post->created_at->toIso8601String() }}')"
	x-text="time"
></div>

<script>
	function timeAgo(dateString) {
		return {
			time: '',
			init() {
				const update = () => {
					const createdAt = new Date(dateString);
					const now = new Date();
					const diff = Math.floor((now - createdAt) / 1000);

					if (diff < 60) {
						this.time = `${diff} seconden geleden`;
					}
					else if (diff < 3600) {
						const minutes = Math.floor(diff / 60);
						this.time = `${minutes} minuten geleden`;
					}
					else if (diff < 86400) {
						const hours = Math.floor(diff / 3600);
						this.time = `${hours} uur geleden`;
					}
					else {
						const days = Math.floor(diff / 86400);
						this.time = `${days} dagen geleden`;
					}
				};

				update();
				setInterval(update, 1000);
			}
		}
	}
</script>

