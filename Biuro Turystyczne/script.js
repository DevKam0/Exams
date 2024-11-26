let nrZdj = 1;
let ilZdj = 7;

function next(){
nrZdj++;
if(nrZdj>ilZdj)
{
    nrZdj=1;
}
else if(nrZdj <1)
{
    nrZdj = ilZdj;
}
update()
}

function previous(){
nrZdj--;
if(nrZdj>ilZdj)
{
    nrZdj=1;
}
else if(nrZdj <1)
{
    nrZdj = ilZdj;
}
update()
}

function update() {
    const Zdj = document.querySelector("#srodek img");
    Zdj.src = nrZdj + ".jpg";
}