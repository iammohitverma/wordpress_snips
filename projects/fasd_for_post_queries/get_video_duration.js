// getting video duration
let $videoSrc = $(".video_duration_src");
let $videoDuration = $(".video_duration");

// Wait for the video metadata to load
$videoSrc.on('loadedmetadata', function () {
    // Get the duration of the video in seconds
    const duration = Math.floor(this.duration);

    // Format the duration into HH:MM:SS format
    const formattedDuration = formatVideoDuration(duration);

    // Set the formatted duration to all .video_duration elements
    $videoDuration.each(function () {
        $(this).html(formattedDuration);
    });

    // console.log(formattedDuration);
});

// Function to format the video duration into HH:MM:SS format
function formatVideoDuration(durationInSeconds) {
    let hours = Math.floor(durationInSeconds / 3600);
    let minutes = Math.floor((durationInSeconds % 3600) / 60);
    let seconds = durationInSeconds % 60;

    return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}
