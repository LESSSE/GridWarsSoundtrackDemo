var FireSong = {on: false, inited: false, range: document.querySelector("#fireValue")};

FireSong.init = function(){
	if (!started){
		audioContext = new AudioContext();
	  	started = true;
  	};

  	this.attacked = false;

 	this.masterGain = audioContext.createGain();
  	this.changingGain = audioContext.createGain();
  	this.fixedGain = audioContext.createGain();

  	this.changingGain.connect(this.masterGain);
  	this.fixedGain.connect(this.masterGain);
	this.masterGain.connect(audioContext.destination);

	this.volume = Amount.getFireFrac();
	this.changingGain.gain.value = this.volume;
	this.masterGain.gain.value = 0;

	this.background();
	this.intro();
	this.attack();

	this.inited = true;
}

FireSong.background = function(){
	this.backgroundSound1 = new Audio();
	this.backgroundSound1.src = "assets/mp3/fire.mp3";
	this.backgroundSound1.autoplay = false;
	this.backgroundSound1.loop = true;

	this.backgroundSoundNode1 = audioContext.createMediaElementSource(this.backgroundSound1);
	this.backgroundGain = audioContext.createGain();
	this.backgroundGain.gain.value=0.7;

	this.backgroundSoundNode1.connect(this.backgroundGain).connect(this.changingGain);

	this.backgroundSound1.play(0);
}


FireSong.intro = function(){
	this.song1 = new Audio();
	this.song1.src = "assets/mp3/GW-intro-fire.mp3";
	this.song1.autoplay = false;
	this.song1.loop = false;

	this.songNode1 = audioContext.createMediaElementSource(this.song1);
	this.songGain1 = audioContext.createGain();
	this.songGain1.gain.value = 1.2;

	this.songNode1.connect(this.songGain1).connect(this.changingGain);

	this.song1.play(0);
	this.song1.addEventListener('ended', (event) => { this.dev(); });
}

FireSong.dev = function(){
	this.song2 = new Audio();
	this.song2.src = "assets/mp3/GW-fire-dev.mp3";
	this.song2.autoplay = false;
	this.song2.loop = true;

	this.songNode2 = audioContext.createMediaElementSource(this.song2);
	this.songGain2 = audioContext.createGain();
	this.songGain2.gain.value = 1.2;

	this.songNode2.connect(this.songGain2).connect(this.changingGain);

	this.song2.play(0);
}

FireSong.attack = function(){
	if (!this.attacked){
		this.sound1 = new Audio();
		this.sound1.src = "assets/mp3/fire-attack.mp3";
		this.sound1.autoplay = false;
		this.sound1.loop = false;

		this.soundNode1 = audioContext.createMediaElementSource(this.sound1);
		this.soundGain1 = audioContext.createGain();
		this.soundGain1.gain.value = 0.35;
		this.soundNode1.connect(this.soundGain1).connect(this.fixedGain);

		this.attacked = true;
	}
	else{
		clearTimeout(this.attackTimeout)
	};

	var time = Math.random() * (10+6) * 1000 + 6 * 1000;

	this.sound1.currentTime = 0;
	this.sound1.play(0);
	this.attackTimeout = setTimeout('FireSong.attack();', time);
};

FireSong.play = function(){
	if(!this.inited){
		init();
	};
	this.masterGain.gain.value = 0.7;
	this.on = true;
}

FireSong.stop = function(){
	this.masterGain.gain.value = 0;
	this.on = false;
}

FireSong.toogle = function(){
	this.on ? this.stop() : this.play();
}