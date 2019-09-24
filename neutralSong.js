var NeutralSong = {on: false, inited: false, range: document.querySelector("#neutralValue")};

NeutralSong.init = function(){
	if (!started){
		audioContext = new AudioContext();
	  	started = true;
  	}


 	this.masterGain = audioContext.createGain();
  	this.changingGain = audioContext.createGain();
  	this.fixedGain = audioContext.createGain();

  	this.changingGain.connect(this.masterGain);
  	this.fixedGain.connect(this.masterGain);
	this.masterGain.connect(audioContext.destination);

	this.volume = Amount.getNeutralFrac();
	this.changingGain.gain.value = this.volume;
	this.masterGain.gain.value = 0;

	this.intro();

	this.inited = true;
}

NeutralSong.intro = function(){
	this.song1 = new Audio();
	this.song1.src = "assets/mp3/GW-intro-neutral.mp3";
	this.song1.autoplay = false;
	this.song1.loop = false;

	this.songNode1 = audioContext.createMediaElementSource(this.song1);
	this.songGain1 = audioContext.createGain();
	this.songGain1.gain.value = 1;

	this.songNode1.connect(this.songGain1).connect(this.changingGain);

	this.song1.play(0);
	this.song1.addEventListener('ended', (event) => { this.dev(); });
}

NeutralSong.dev = function(){
	this.song2 = new Audio();
	this.song2.src = "assets/mp3/GW-neutral-dev.mp3";
	this.song2.autoplay = false;
	this.song2.loop = true;

	this.songNode2 = audioContext.createMediaElementSource(this.song2);
	this.songGain2 = audioContext.createGain();
	this.songGain2.gain.value = 1;

	this.songNode2.connect(this.songGain2).connect(this.changingGain);

	this.song2.play(0);
}

NeutralSong.play = function(){
	if(!this.inited){
		init();
	}
	this.masterGain.gain.value = 0.85;
	this.on = true;
}

NeutralSong.stop = function(){
	this.masterGain.gain.value = 0;
	this.on = false;
}

NeutralSong.toogle = function(){
	this.on ? this.stop() : this.play();
}
