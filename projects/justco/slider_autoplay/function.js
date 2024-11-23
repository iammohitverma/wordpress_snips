// 	slider video autoplay
const intervalId = setInterval(() => {
    const parentDiv = $(".collective_video"); // Target parent div
    const controlTag = parentDiv.find("sr7-lrg-ctrl"); // Find control tag

    if (controlTag.hasClass("paused")) {
        clearInterval(intervalId); // Stop when 'paused' class is detected
        console.log("Paused class detected. Stopping clicks.");
    } else {
        parentDiv.click(); // Trigger click on parent div
        const video = parentDiv.find("video");
        if (video.length) {
            video[0].click(); // Trigger click on video inside
            console.log("Triggered video click.");
        }
    }
}, 1000); // Run every 1 second