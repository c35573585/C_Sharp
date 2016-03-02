using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Decisions
{
    class Program
    {
        static void Main(string[] args)
        {
            /*
            Console.WriteLine("Please type something and press the Enter key. ");
            string userValue = Console.ReadLine();
            Console.WriteLine("You typed: " + userValue);
            Console.ReadLine();
            */

            //first method
            /*
            Console.WriteLine("Would you prefer what is behind door number 1, 2, or 3?");
            string userValue = Console.ReadLine();
            if (userValue == "1")
            {
                Console.WriteLine("You won a new car!");
                Console.ReadLine();
            }
            else if (userValue == "2") 
            {
                Console.WriteLine("You won a new boat!");
                Console.ReadLine();
            }
            else if (userValue == "3")
            {
                Console.WriteLine("You won a cat!");
                Console.ReadLine();
            }
            else 
            {
                Console.WriteLine("Sorry, we didn't understand. You lose!");
                Console.ReadLine();
            }
             */

            //second method
            /*
            Console.WriteLine("Would you prefer what is behind door number 1, 2, or 3?");
            string userValue = Console.ReadLine();

            string message = "";

            if (userValue == "1")
                message = "You won a new car!";
            else if (userValue == "2")
                message = "You won a new boat!";
            else if (userValue == "3")
                message = "You won a cat!";
            else
                message = "Sorry, we didn't understand. You lose!";

            Console.WriteLine(message);
             */

            //third method
            Console.WriteLine("Would you prefer what is behind door number 1, 2, or 3?");
            string userValue = Console.ReadLine();

            string message = (userValue == "1") ? "boat" : "Strand of lint";
            Console.WriteLine("you won a {0}", message);

            Console.ReadLine();
        }
    }
}
