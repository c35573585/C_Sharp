using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace UsingSwitch
{
    class Program
    {
        static void Main(string[] args)
        {
            /*switch
            Console.WriteLine("Type in a super hero's name to his nickname: ");
            string userValue = Console.ReadLine();

            switch (userValue.ToUpper())
            {
                case "BATMAN":
                    Console.WriteLine("Caped Crusader");
                    break;
                case "SUPERMAN":
                    Console.WriteLine("Man of Steel");
                    break;
                case "GREENLANTERN":
                    Console.WriteLine("Emerald Knight");
                    break;
                default:
                    Console.WriteLine("Does not compute");
                    break;
            }
             */

            Console.WriteLine("Pick a number between 1 and 100: ");
            string myValue = Console.ReadLine();

            int compareValue = int.Parse(myValue);

            if (compareValue < 1 || compareValue > 100)
                Console.WriteLine("The number you choose was out of bounds.");
            else if (compareValue == 2 || compareValue > 90)
                Console.WriteLine("You found one of the special number!");
            else
                Console.WriteLine("You didn't find one of the special numbers.");

            Console.ReadLine();
        }
    }
}
