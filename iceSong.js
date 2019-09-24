var IceSong = {on: false, inited: false, range: document.querySelector("#iceValue")};

IceSong.init = function(){
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

	this.volume = Amount.getIceFrac();
	this.changingGain.gain.value = this.volume;
	this.masterGain.gain.value = 0;

	this.background();
	this.intro();	
	this.attack();

	this.inited = true;
};

IceSong.background = function(){
	this.backgroundSound1 = new Audio();
	this.backgroundSound1.src = "assets/mp3/blizzard.mp3";
	this.backgroundSound1.autoplay = false;
	this.backgroundSound1.loop = true;

	this.backgroundSound2 = new Audio();
	this.backgroundSound2.src = "assets/mp3/water.mp3";
	this.backgroundSound2.autoplay = false;
	this.backgroundSound2.loop = true;

	this.backgroundSoundNode1 = audioContext.createMediaElementSource(this.backgroundSound1);
	this.backgroundSoundNode2 = audioContext.createMediaElementSource(this.backgroundSound2);

	this.backgroundGain = audioContext.createGain();
	this.backgroundGain.gain.value=0.9;

	this.backgroundSoundNode1.connect(this.backgroundGain).connect(this.changingGain);
	this.backgroundSoundNode2.connect(this.backgroundGain);

	this.backgroundSound2.play(0);
	this.backgroundSound1.play(0);
};


IceSong.intro = function(){
	this.song1 = new Audio();
	this.song1.src = "assets/mp3/GW-intro-ice.mp3";
	this.song1.autoplay = false;
	this.song1.loop = false;

	this.songNode1 = audioContext.createMediaElementSource(this.song1);
	this.songGain1 = audioContext.createGain();
	this.songGain1.gain.value=1.5;

	this.songNode1.connect(this.songGain1).connect(this.changingGain);

	this.song1.play(0);
	this.song1.onended = this.dev;
	this.song1.addEventListener('ended', (event) => { this.dev(); });
};

IceSong.dev = function(){
	this.song2 = new Audio();
	this.song2.src = "assets/mp3/GW-ice-dev.mp3";
	this.song2.autoplay = false;
	this.song2.loop = true;

	this.songNode2 = audioContext.createMediaElementSource(this.song2);
	this.songGain2 = audioContext.createGain();
	this.songGain2.gain.value = 1.5;
	this.songNode2.connect(this.songGain2).connect(this.changingGain);

	this.song2.play(0);
};

IceSong.attack = function(){
	if (!this.attacked){
		this.attackSound1 = new Audio();
		this.attackSound1.src = "assets/mp3/ice-attack.mp3";
		this.attackSound1.autoplay = false;
		this.attackSound1.loop = false;

		this.attackSoundNode1 = audioContext.createMediaElementSource(this.attackSound1);
		this.attackSoundGain1 = audioContext.createGain();
		this.attackSoundGain1.gain.value = 0.25;
		this.attackSoundNode1.connect(this.attackSoundGain1).connect(this.fixedGain);

		this.attacked = true;
	}
	else{
		clearTimeout(this.attackTimeout)
	};

	var time = Math.random() * (10) * 1000 + 10 * 1000;

	this.attackSound1.play(0);
	this.attackTimeout = setTimeout('IceSong.attack();', time);
};

IceSong.play = function(){
	if(!this.inited){
		init();
	}
	this.masterGain.gain.value = 0.7;
	this.on = true;
};

IceSong.stop = function(){
	this.masterGain.gain.value = 0;
	this.on = false;
};

IceSong.toogle = function(){
	this.on ? this.stop() : this.play();
};
