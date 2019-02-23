
byte ports[] = {12,9,2,3,4,5,6,7,8,10,11};
int overallHealth = 90;
void setup() {
  // put your setup code here, to run once:
  pinMode(1, OUTPUT);
  pinMode(2, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(8, OUTPUT);
  pinMode(9, OUTPUT);
}

void bounceLights(){
  
  for(byte i : ports){
    digitalWrite(i, HIGH);
    delay(60);
    digitalWrite(i,LOW);
    
  }
  for(int i = sizeof(ports)-1; i >= 0; i--){
    byte j = ports[i];
    digitalWrite(j, HIGH);
    delay(60);
    digitalWrite(j,LOW);
  }
}

void blinkBlueLight(){
  digitalWrite(ports[0], HIGH);
  delay(200);
  digitalWrite(ports[0], LOW);
  delay(200);
}
  int loopCount = 0;

void loop() {
  if(loopCount<3){
    bounceLights();
  }
  else if(loopCount < 8){
    blinkBlueLight();
  }
  else {
    digitalWrite(ports[(100-overallHealth)/10+1], HIGH);
    delay(2000);
    digitalWrite(ports[(100-overallHealth)/10+1], LOW);
    overallHealth -= 40;
    if(overallHealth <= 0){
      loopCount = 100;
      exit(0);
    }
    loopCount = -1;
  }
  loopCount++;
}
