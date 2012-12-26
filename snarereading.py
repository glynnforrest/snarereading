import random

notes = {
    0.5 : ["sn2", "sn4 sn"],
    0.25 : ["sn4", "sn8 sn"],
    0.125 : ["sn8", "sn16 sn"],
    0.0625 : ["sn16", "sn32 sn"],
    }

def randomNote(duration):
    return random.choice(notes[duration])

def randomPhrase(length):
    blocks = []
    while sum(blocks) < length:
        blocks.append(random.choice(list(notes.keys())))
        if(sum(blocks)) > length:
            blocks.pop()
    phrase = [randomNote(duration) for duration in blocks]
    return " ".join(phrase)

def main():
    music = ""
    for i in range(1,17):
        music += ' ' + randomPhrase(1)
    print('\drums { ' + music + '}')


if __name__ == "__main__":
    main()
