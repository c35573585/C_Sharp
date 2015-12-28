using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BullsAndCows
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Choose to be a Dealer or Player or Exit : (Type in d or p or e)");
            string x = Console.ReadLine();
            while (x != "e")
            {
                Console.WriteLine("Choose to be a Dealer or Player or Exit : (Type in d or p or e)");
                string a = Console.ReadLine();
                switch (a.ToUpper())
                {
                    case "D":
                        Dealer();
                        Console.WriteLine();
                        break;
                    case "P":
                        Player();
                        Console.WriteLine();
                        break;
                    default:
                        Console.WriteLine("Please type again!");
                        Console.WriteLine();
                        break;
                }
            }
            if (x == "e")
                Console.WriteLine("Good Bye!");
            Console.ReadLine();
        }

        //玩家做莊
        public static void Dealer()
        {
            Console.WriteLine("Please type in a number between 1 and 100: ");
            string a = Console.ReadLine();
            int myNumber = Int32.Parse(a);
            int count = 0;

            //電腦隨機產生數字
            Random ran = new Random(Guid.NewGuid().GetHashCode());
            int sysValue = ran.Next(1, 51);
            while (myNumber <=100 && myNumber >=1 && count < 10)
            {
                Console.WriteLine("System: " + sysValue);
                count++;
                if (myNumber == sysValue)
                {
                    Console.WriteLine("You are Loser!");
                    break;
                }
                else if (myNumber > sysValue)
                {
                    Console.WriteLine("System value < Your number!");
                    sysValue = ran.Next(sysValue + 1, myNumber);
                }
                else if (myNumber < sysValue)
                {
                    Console.WriteLine("System value > Your number!");
                    sysValue = ran.Next(myNumber, sysValue);
                }
            }
            if(count >= 10)
                Console.WriteLine("You are Winner!");

        }

        //電腦做莊
        public static void Player()
        {
            Random ran = new Random(Guid.NewGuid().GetHashCode());
            int sysNumber = ran.Next(1, 100);

            Console.WriteLine("Please type in a number between 1 and 100: ");
            int count = 0;

            while (count < 10)
            {
                string a = Console.ReadLine();
                int myValue = Int32.Parse(a);
                if (myValue <= 100 && myValue >= 1)
                {
                    count++;
                    if (myValue == sysNumber)
                    {
                        Console.WriteLine("You are Winner!");
                        break;
                    }
                    else if (myValue > sysNumber)
                    {
                        Console.WriteLine("Your value > System number!");
                    }
                    else if (myValue < sysNumber)
                    {
                        Console.WriteLine("Your value < System Number");
                    }
                }
                else
                {
                    Console.WriteLine("Please type in a number between 1 and 100! ");
                }
            }
            if (count >= 10)
                Console.WriteLine("You are Loser!");

        }
    }
}
